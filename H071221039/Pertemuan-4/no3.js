// Kata palindrom adalah sebuah kata yang jika dibalik maka akan menghasilkan kata itu sendiri seperti malam, apa, 131, 12321, Kodok, kasur ini rusak. Anda diminta untuk membuat sebuah program yang mengecek apakah sebuah kata itu palindrom atau tidak.

function isPalindrome(input) {
    if (typeof input != 'string') {
      input = input.toString();
    }
  

    input = input.toLowerCase().replace(/\s/g, '');
    const reversedInput = input.split('').reverse().join('');
    if (input == reversedInput) {
      console.log(`${input} adalah palindrom.`);
    } else{
      console.log(`${inputan} bukan palindrom.`);
    }
  }
  

  const prompt=require("prompt-sync")({sigint:true});
  const inputan = prompt("Masukkan kata/angka : ")

  isPalindrome(inputan)

  
  // const angka = 12321;
  // if (isPalindrome(angka)) {
  //   console.log(`${angka} adalah palindrom.`);
  // } else {
  //   console.log(`${angka} bukan palindrom.`);
  // }
  