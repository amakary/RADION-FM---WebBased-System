var eth;
var user_address;

window.addEventListener('load', async () => {
  // Modern dapp browsers...
  if (window.ethereum) {
    window.web3 = new Web3(ethereum);
    try {
      // Request account access if needed
      await ethereum.enable();

      eth = new Eth(web3.currentProvider);

      web3.version.getNetwork((err, netId) => {

        if (netId != 4) {
          alert('Change to Rinkeby');
        } else {
          main();
        }
      });

    } catch (error) {
      console.log(error);
    }
  }
  // Legacy dapp browsers...
  else if (window.web3) {
    window.web3 = new Web3(web3.currentProvider);

    eth = new Eth(web3.currentProvider);

    web3.version.getNetwork((err, netId) => {

      if (netId != 4) {
        alert('Change to Rinkeby');
      } else {
        main();
      }
    });

  }
  // Non-dapp browsers...
  else {
    console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
  }
});

function main() {

  setInterval(function () {
    if (web3.eth.accounts[0] !== user_address) {
      user_address = web3.eth.accounts[0];

      tokenContract.balanceOf(user_address, {
          from: user_address
        })
        .then(res => {
          console.log(res[0]);
          document.getElementById('balance').innerHTML = `${parseInt(Eth.fromWei(res[0],'ether'))} RADIO`;
        })

      tokenContract.totalSupply({
          from: user_address
        })
        .then(res => {
          console.log(res[0]);
          var supply = res[0];
          tokenContract.poolBalance({
              from: user_address
            })
            .then(res => {
              console.log(res[0]);
              var pool = res[0];
              tokenContract.reserveRatio({
                  from: user_address
                })
                .then(res => {
                  console.log(res[0]);
                  var reserve = res[0];

                  tokenContract.calculatePurchaseReturn(supply, pool, reserve, 1e18, {
                      from: user_address
                    })
                    .then(res => {
                      console.log(res[0].toString());
                      document.getElementById('buyPrice').innerHTML = `${Eth.fromWei(res[0],'ether')} RADIO`;
                    })

                  tokenContract.calculateSaleReturn(supply, pool, reserve, 1e18, {
                      from: user_address
                    })
                    .then(res => {
                      console.log(res[0].toString());
                      document.getElementById('sellPrice').innerHTML = `${Eth.fromWei(res[0],'ether')} ETH`;
                    })

                })
            })
        })
    }
  }, 1000);

  window.tokenAddress = '0x1ffba08b119462879372d72c5419fd417c130acb'; //Rinkeby

  const tokenABI = [{
    "constant": true,
    "inputs": [],
    "name": "name",
    "outputs": [{
      "name": "",
      "type": "string"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "spender",
      "type": "address"
    }, {
      "name": "value",
      "type": "uint256"
    }],
    "name": "approve",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "reserveRatio",
    "outputs": [{
      "name": "",
      "type": "uint32"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "totalSupply",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "from",
      "type": "address"
    }, {
      "name": "to",
      "type": "address"
    }, {
      "name": "value",
      "type": "uint256"
    }],
    "name": "transferFrom",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [{
      "name": "_supply",
      "type": "uint256"
    }, {
      "name": "_connectorBalance",
      "type": "uint256"
    }, {
      "name": "_connectorWeight",
      "type": "uint32"
    }, {
      "name": "_depositAmount",
      "type": "uint256"
    }],
    "name": "calculatePurchaseReturn",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "decimals",
    "outputs": [{
      "name": "",
      "type": "uint8"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "MAX_SUPPLY",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "spender",
      "type": "address"
    }, {
      "name": "addedValue",
      "type": "uint256"
    }],
    "name": "increaseAllowance",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [{
      "name": "_supply",
      "type": "uint256"
    }, {
      "name": "_connectorBalance",
      "type": "uint256"
    }, {
      "name": "_connectorWeight",
      "type": "uint32"
    }, {
      "name": "_sellAmount",
      "type": "uint256"
    }],
    "name": "calculateSaleReturn",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "version",
    "outputs": [{
      "name": "",
      "type": "string"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [{
      "name": "owner",
      "type": "address"
    }],
    "name": "balanceOf",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [],
    "name": "renounceOwnership",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "owner",
    "outputs": [{
      "name": "",
      "type": "address"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "isOwner",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "symbol",
    "outputs": [{
      "name": "",
      "type": "string"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "poolBalance",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "spender",
      "type": "address"
    }, {
      "name": "subtractedValue",
      "type": "uint256"
    }],
    "name": "decreaseAllowance",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [],
    "name": "buy",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": true,
    "stateMutability": "payable",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "to",
      "type": "address"
    }, {
      "name": "value",
      "type": "uint256"
    }],
    "name": "transfer",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "_gasPrice",
      "type": "uint256"
    }],
    "name": "setGasPrice",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [{
      "name": "owner",
      "type": "address"
    }, {
      "name": "spender",
      "type": "address"
    }],
    "name": "allowance",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "sellAmount",
      "type": "uint256"
    }],
    "name": "sell",
    "outputs": [{
      "name": "",
      "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": false,
    "inputs": [{
      "name": "newOwner",
      "type": "address"
    }],
    "name": "transferOwnership",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
  }, {
    "constant": true,
    "inputs": [],
    "name": "gasPrice",
    "outputs": [{
      "name": "",
      "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
  }, {
    "inputs": [{
      "name": "_initialTotalSupply",
      "type": "uint256"
    }, {
      "name": "_reserveRatio",
      "type": "uint32"
    }, {
      "name": "_gasPrice",
      "type": "uint256"
    }],
    "payable": true,
    "stateMutability": "payable",
    "type": "constructor"
  }, {
    "payable": true,
    "stateMutability": "payable",
    "type": "fallback"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": false,
      "name": "amountMinted",
      "type": "uint256"
    }, {
      "indexed": false,
      "name": "totalCost",
      "type": "uint256"
    }],
    "name": "LogMint",
    "type": "event"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": false,
      "name": "amountWithdrawn",
      "type": "uint256"
    }, {
      "indexed": false,
      "name": "reward",
      "type": "uint256"
    }],
    "name": "LogWithdraw",
    "type": "event"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": false,
      "name": "logString",
      "type": "string"
    }, {
      "indexed": false,
      "name": "value",
      "type": "uint256"
    }],
    "name": "LogBondingCurve",
    "type": "event"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": true,
      "name": "previousOwner",
      "type": "address"
    }, {
      "indexed": true,
      "name": "newOwner",
      "type": "address"
    }],
    "name": "OwnershipTransferred",
    "type": "event"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": true,
      "name": "from",
      "type": "address"
    }, {
      "indexed": true,
      "name": "to",
      "type": "address"
    }, {
      "indexed": false,
      "name": "value",
      "type": "uint256"
    }],
    "name": "Transfer",
    "type": "event"
  }, {
    "anonymous": false,
    "inputs": [{
      "indexed": true,
      "name": "owner",
      "type": "address"
    }, {
      "indexed": true,
      "name": "spender",
      "type": "address"
    }, {
      "indexed": false,
      "name": "value",
      "type": "uint256"
    }],
    "name": "Approval",
    "type": "event"
  }]

  window.tokenContract = eth.contract(tokenABI).at(tokenAddress);

  eth.gasPrice((err, res) => {
    window.gasprice = (new Eth.BN(res)).toNumber();
  });

}


function transfer() {

  var toAddress = document.getElementById('receiptAddress').value;
  var value = document.getElementById('sendAmount').value;

  if (Eth.isAddress(toAddress)) {
    tokenContract.transfer(toAddress, Eth.toWei(parseInt(value), 'ether'), {
        from: user_address,
        value: '0x0',
        gasPrice: gasprice
      })
      .then(txHash => eth.getTransactionSuccess(txHash))
      .then(receipt => {
        alert(`Transaction Sent\nTx Hash: ${receipt.transactionHash}`)
      })
      .catch((err) => {
        console.log(err);
      })
  }
}

function buy() {

  var value = document.getElementById('ethAmountBuy').value;

  tokenContract.buy({
      from: user_address,
      value: Eth.toWei(parseInt(value), 'ether'),
      gasPrice: gasprice
    })
    .then(txHash => eth.getTransactionSuccess(txHash))
    .then(receipt => {
      alert(`Transaction Sent\nTx Hash: ${receipt.transactionHash}`)
    })
    .catch((err) => {
      console.log(err);
    })
}


function sell() {

  var value = document.getElementById('tokenAmountSell').value;

  tokenContract.sell(Eth.toWei(parseInt(value), 'ether'), {
      from: user_address,
      value: '0x0',
      gasPrice: gasprice
    })
    .then(txHash => eth.getTransactionSuccess(txHash))
    .then(receipt => {
      alert(`Transaction Sent\nTx Hash: ${receipt.transactionHash}`)
    })
    .catch((err) => {
      console.log(err);
    })
}

function expectedBuy() {

  var value = document.getElementById('ethAmountTest').value;

  tokenContract.totalSupply({
      from: user_address
    })
    .then(res => {
      console.log(res[0]);
      var supply = res[0];
      tokenContract.poolBalance({
          from: user_address
        })
        .then(res => {
          console.log(res[0]);
          var pool = res[0];
          tokenContract.reserveRatio({
              from: user_address
            })
            .then(res => {
              console.log(res[0]);
              var reserve = res[0];

              tokenContract.calculatePurchaseReturn(supply, pool, reserve, Eth.toWei(parseInt(value), 'ether'), {
                  from: user_address
                })
                .then(res => {
                  console.log(res[0]);
                  alert(`You should get about ${Eth.fromWei(res[0],'ether')} RADIO`);
                })

            })
        })
    })
}

function expectedSell() {

  var value = document.getElementById('tokenAmountTest').value;

  tokenContract.totalSupply({
      from: user_address
    })
    .then(res => {
      console.log(res[0]);
      var supply = res[0];
      tokenContract.poolBalance({
          from: user_address
        })
        .then(res => {
          console.log(res[0]);
          var pool = res[0];
          tokenContract.reserveRatio({
              from: user_address
            })
            .then(res => {
              console.log(res[0]);
              var reserve = res[0];

              tokenContract.calculateSaleReturn(supply, pool, reserve, Eth.toWei(parseInt(value), 'ether'), {
                  from: user_address
                })
                .then(res => {
                  console.log(res[0].toString());
                  alert(`You should get about ${Eth.fromWei(res[0],'ether')} ETH`);
                })

            })
        })
    })
}