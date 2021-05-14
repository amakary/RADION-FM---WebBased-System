
type token_id = nat

type transfer_destination =
[@layout:comb]
{
  to_ : address;
  token_id : token_id;
  amount : nat;
}

type transfer =
[@layout:comb]
{
  from_ : address;
  txs : transfer_destination list;
}

type balance_of_request =
[@layout:comb]
{
  owner : address;
  token_id : token_id;
}

type balance_of_response =
[@layout:comb]
{
  request : balance_of_request;
  balance : nat;
}

type balance_of_param =
[@layout:comb]
{
  requests : balance_of_request list;
  callback : (balance_of_response list) contract;
}

type operator_param =
[@layout:comb]
{
  owner : address;
  operator : address;
  token_id: token_id;
}

type update_operator =
[@layout:comb]
  | Add_operator of operator_param
  | Remove_operator of operator_param

type token_metadata =
[@layout:comb]
  {
    token_id: token_id;
    token_info: ((string, bytes) map);
  }

type token_metadata_param =
[@layout:comb]
{
  token_ids : token_id list;
  handler : (token_metadata list) -> unit;
}

type token_metadata_storage = (token_id, token_metadata) big_map

type fa2_entry_points =
  | Transfer of transfer list
  | Balance_of of balance_of_param
  | Update_operators of update_operator list

type fa2_token_metadata =
  | Token_metadata of token_metadata_param

type operator_transfer_policy =
  [@layout:comb]
  | No_transfer
  | Owner_transfer
  | Owner_or_operator_transfer

type owner_hook_policy =
  [@layout:comb]
  | Owner_no_hook
  | Optional_owner_hook
  | Required_owner_hook

type custom_permission_policy =
[@layout:comb]
{
  tag : string;
  config_api: address option;
}

type permissions_descriptor =
[@layout:comb]
{
  operator : operator_transfer_policy;
  receiver : owner_hook_policy;
  sender : owner_hook_policy;
  custom : custom_permission_policy option;
}

type transfer_destination_descriptor =
[@layout:comb]
{
  to_ : address option;
  token_id : token_id;
  amount : nat;
}

type transfer_descriptor =
[@layout:comb]
{
  from_ : address option;
  txs : transfer_destination_descriptor list
}

type transfer_descriptor_param =
[@layout:comb]
{
  batch : transfer_descriptor list;
  operator : address;
}

(* `pauseable_admin` entry points *)
type pauseable_admin =
  | Set_admin of address
  | Confirm_admin of unit
  | Pause of bool

type pauseable_admin_storage_record = {
  admin : address;
  pending_admin : address option;
  paused : bool;
}

type pauseable_admin_storage = pauseable_admin_storage_record option

let confirm_new_admin (storage : pauseable_admin_storage) : pauseable_admin_storage =
  match storage with
    | Some s ->
        ( match s.pending_admin with
          | None -> (failwith "NO_PENDING_ADMIN" : pauseable_admin_storage)
          | Some pending ->
            if Tezos.sender = pending
            then (Some ({s with
              pending_admin = (None : address option);
              admin = Tezos.sender;
            } : pauseable_admin_storage_record))
            else (failwith "NOT_A_PENDING_ADMIN" : pauseable_admin_storage))
    | None -> (failwith "NO_ADMIN_CAPABILITIES_CONFIGURED" : pauseable_admin_storage)

let fail_if_not_admin (storage : pauseable_admin_storage) : unit =
  match storage with
    | Some a ->
        if Tezos.sender <> a.admin
        then failwith "NOT_AN_ADMIN"
        else unit
    | None -> unit

let fail_if_not_admin_ext (storage, extra_msg : pauseable_admin_storage * string) : unit =
  match storage with
    | Some a ->
        if Tezos.sender <> a.admin
        then failwith ("NOT_AN_ADMIN" ^  " "  ^ extra_msg)
        else unit
    | None -> unit

let set_admin (new_admin, storage : address * pauseable_admin_storage) : pauseable_admin_storage =
  let u = fail_if_not_admin storage in
  match storage with
    | Some s ->
        (Some ({ s with pending_admin = Some new_admin; } : pauseable_admin_storage_record))
    | None -> (failwith "NO_ADMIN_CAPABILITIES_CONFIGURED" : pauseable_admin_storage)

let pause (paused, storage: bool * pauseable_admin_storage) : pauseable_admin_storage =
  let u = fail_if_not_admin storage in
  match storage with
    | Some s ->
        (Some ({ s with paused = paused; } : pauseable_admin_storage_record ))
    | None -> (failwith "NO_ADMIN_CAPABILITIES_CONFIGURED" : pauseable_admin_storage)

let fail_if_paused (storage : pauseable_admin_storage) : unit =
  match storage with
    | Some a ->
        if a.paused
        then failwith "PAUSED"
        else unit
    | None -> unit

let pauseable_admin (param, storage : pauseable_admin *pauseable_admin_storage)
    : (operation list) * (pauseable_admin_storage) =
  match param with
  | Set_admin new_admin ->
      let new_s = set_admin (new_admin, storage) in
      (([] : operation list), new_s)

  | Confirm_admin u ->
      let new_s = confirm_new_admin storage in
      (([]: operation list), new_s)

  | Pause paused ->
      let new_s = pause (paused, storage) in
      (([]: operation list), new_s)

type fee_data = 
  [@layout:comb]
  {
    fee_address : address;
    fee_percent : nat;
  }

type fa2_tokens =
  [@layout:comb]
  {
    token_id : token_id;
    amount : nat;
  }

type tokens =
  [@layout:comb]
  {
    fa2_address : address;
    fa2_batch : (fa2_tokens list);
  }

type global_token_id =
  [@layout:comb]
  {
      fa2_address : address;
      token_id : token_id;
  }

let ceil_div_nat (numerator, denominator : nat * nat) : nat = abs ((- numerator) / (int denominator))

let percent_of_bid_nat (percent, bid : nat * nat) : nat = 
  (ceil_div_nat (bid *  percent, 100n))

let ceil_div_tez (tz_qty, nat_qty : tez * nat) : tez = 
  let ediv1 : (tez * tez) option = ediv tz_qty nat_qty in 
  match ediv1 with 
    | None -> (failwith "DIVISION_BY_ZERO"  : tez) 
    | Some e -> 
       let (quotient, remainder) = e in
       if remainder > 0mutez then (quotient + 1mutez) else quotient

let percent_of_bid_tez (percent, bid : nat * tez) : tez = 
  (ceil_div_tez (bid *  percent, 100n))

let assert_msg (condition, msg : bool * string ) : unit =
  if (not condition) then failwith(msg) else unit

let address_to_contract_transfer_entrypoint(add : address) : ((transfer list) contract) =
  let c : (transfer list) contract option = Tezos.get_entrypoint_opt "%transfer" add in
  match c with
    None -> (failwith "Invalid FA2 Address" : (transfer list) contract)
  | Some c ->  c

let resolve_contract (add : address) : unit contract =
  match ((Tezos.get_contract_opt add) : (unit contract) option) with
      None -> (failwith "Return address does not resolve to contract" : unit contract)
    | Some c -> c

type sale_token_param_tez =
[@layout:comb]
{
 token_for_sale_address: address;
 token_for_sale_token_id: token_id;
}

type sale_param_tez =
[@layout:comb]
{
  seller: address;
  sale_token: sale_token_param_tez;
}

type storage =
[@layout:comb]
{
  admin: pauseable_admin_storage;
  commission_tenthousandth: nat;
  sales: (sale_param_tez, tez) big_map;
}

type init_sale_param_tez =
[@layout:comb]
{
  sale_price: tez;
  sale_token_param_tez: sale_token_param_tez;
}

type init_sales_param_tez = init_sale_param_tez list
type ops = operation list

type market_entry_points =
  | Sell of init_sales_param_tez
  | Buy of sale_param_tez
  | Set_commission of nat
  | Cancel of sale_param_tez
  | Admin of pauseable_admin

let assert_msg (condition, msg : bool * string ) : unit =
  if (not condition) then failwith(msg) else unit

let transfer_nft(fa2_address, token_id, from, to_: address * token_id * address * address): operation =
  let fa2_transfer : ((transfer list) contract) option =
      Tezos.get_entrypoint_opt "%transfer"  fa2_address in
  let transfer_op = match fa2_transfer with
  | None -> (failwith "CANNOT_INVOKE_FA2_TRANSFER" : operation)
  | Some c ->
    let tx = {
      from_ = from;
      txs= [{
        to_ = to_;
        token_id = token_id;
        amount = 1n;
    }]} in
    Tezos.transaction [tx] 0mutez c in
  transfer_op

let transfer_tez (qty, to_ : tez * address) : operation =
  let destination = (match (Tezos.get_contract_opt to_ : unit contract option) with
    | None -> (failwith "ADDRESS_DOES_NOT_RESOLVE" : unit contract)
    | Some acc -> acc) in 
  Tezos.transaction () qty destination

let buy_token(sale, storage: sale_param_tez * storage) : (operation list * storage) =
  let sale_price : tez = (match Big_map.find_opt sale storage.sales with
  | None -> (failwith "NO_SALE": tez)
  | Some s -> s) in 
  let amountError : unit =
    if Tezos.amount <> sale_price
    then ([%Michelson ({| { FAILWITH } |} : string * tez * tez -> unit)] ("WRONG_TEZ_PRICE", sale_price, Tezos.amount) : unit)
    else () in
  let tx_nft = transfer_nft(sale.sale_token.token_for_sale_address, sale.sale_token.token_for_sale_token_id, Tezos.self_address, Tezos.sender) in
  match storage.admin with
    | Some admin ->
        let commission_price : tez = sale_price * storage.commission_tenthousandth / 10000n in
        let net_price : tez = sale_price - commission_price in
        let tx_commission = transfer_tez(commission_price, admin.admin) in
        let tx_price = transfer_tez(net_price, sale.seller) in
        let oplist : operation list = [tx_nft; tx_commission; tx_price] in
        let new_s = { storage with sales = Big_map.remove sale storage.sales } in
        oplist, new_s
    | None ->
        let tx_price = transfer_tez(sale_price, sale.seller) in
        let oplist : operation list = [tx_nft; tx_price] in
        let new_s = { storage with sales = Big_map.remove sale storage.sales } in
        oplist, new_s

let tez_stuck_guard(entrypoint: string) : string = "DON'T TRANSFER TEZ TO THIS ENTRYPOINT (" ^ entrypoint ^ ")"

let deposit_for_sale(ops, sale : ops * init_sale_param_tez) : operation list =
    let sale_token : sale_token_param_tez = sale.sale_token_param_tez in
    let transfer_op =
      transfer_nft (sale_token.token_for_sale_address, sale_token.token_for_sale_token_id, Tezos.sender, Tezos.self_address) in
    transfer_op :: ops

let deposit_for_sale_storage(storage, sale : storage * init_sale_param_tez) : storage =
    let sale_token : sale_token_param_tez = sale.sale_token_param_tez in
    let price : tez = sale.sale_price in
    let sale_param = { seller = Tezos.sender; sale_token = sale_token } in
    let new_s = { storage with sales = Big_map.add sale_param price storage.sales } in
    new_s

let deposit_for_sale_batch(sales, storage : init_sales_param_tez * storage) : (operation list * storage) =
    let u : unit = if Tezos.amount <> 0tez then failwith (tez_stuck_guard "SELL") else () in
    let ops : ops = List.fold deposit_for_sale sales ([] : ops) in
    let new_s : storage = List.fold deposit_for_sale_storage sales storage in
    ops, new_s

let set_commission(commission, storage : nat * storage) : (operation list * storage) =
    let new_s : storage = { storage with commission_tenthousandth = commission } in
    ([] : operation list), new_s

let cancel_sale(sale, storage: sale_param_tez * storage) : (operation list * storage) =
  let u : unit = if Tezos.amount <> 0tez then failwith (tez_stuck_guard "CANCEL") else () in
  match Big_map.find_opt sale storage.sales with
    | None -> (failwith "NO_SALE" : (operation list * storage))
    | Some price -> if sale.seller = Tezos.sender then
                      let tx_nft_back_op = transfer_nft(sale.sale_token.token_for_sale_address, sale.sale_token.token_for_sale_token_id, Tezos.self_address, Tezos.sender) in
                      [tx_nft_back_op], {storage with sales = Big_map.remove sale storage.sales }
      else (failwith "NOT_OWNER": (operation list * storage))

let fixed_price_sale_tez_main (p, storage : market_entry_points * storage) : operation list * storage = match p with
  | Sell sales ->
     let u : unit = fail_if_paused(storage.admin) in
     deposit_for_sale_batch(sales, storage)
  | Buy sale ->
     let u : unit = fail_if_paused(storage.admin) in
     buy_token(sale, storage)
  | Set_commission commission ->
    let u : unit = fail_if_not_admin(storage.admin) in
    set_commission(commission, storage)
  | Cancel sale ->
     let u : unit = fail_if_paused(storage.admin) in
     let is_seller = Tezos.sender = sale.seller in
     let v : unit = if is_seller then ()
             else fail_if_not_admin_ext (storage.admin, "OR A SELLER") in
     cancel_sale(sale,storage)
  | Admin a ->
     let ops, admin = pauseable_admin(a, storage.admin) in
     let new_storage = { storage with admin = admin; } in
     ops, new_storage

let sample_storage : storage =
  {
    admin = Some ({
        admin =  ("tz1KqTpEZ7Yob7QbPE4Hy4Wo8fHG8LhKxZSx" :address);
        pending_admin = (None : address option);
        paused = false;});
    commission_tenthousandth = 358n;
    sales = (Big_map.empty : (sale_param_tez, tez) big_map);
  }
