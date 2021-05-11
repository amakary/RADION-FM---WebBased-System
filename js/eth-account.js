window.onload = () => {
    var web3 = new Web3(new Web3.providers.HttpProvider('https://mainnet.infura.io/106400fd22d744ccbdbf32c44a65c1aa'));
    document.getElementById("create").addEventListener("click", () => {
        var result = web3.eth.accounts.create();
        if (typeof result != "undefined") {
            console.log(result);
            document.getElementById("result").innerHTML = `
                Your Public Address : <br><b>${result.address}</b><br><br>
                Your Private key : <br><b>${result.privateKey}</b><br>
            `;
        }
    });
}