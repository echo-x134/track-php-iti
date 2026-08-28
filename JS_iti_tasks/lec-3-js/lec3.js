/**
 * task 1
 */

// let arr = [1, 2, 3, 4, 5, 1, 3];
// function getSecNumbers(arr) {
//     let arr2 = [...new Set(arr)];
//     unique.sort((a, b) => a - b);
//     let secondLowest = arr2[1];
//     let secondGreatest = arr2[arr2.length - 2];

//     return [secondLowest, secondGreatest];
// }

// console.log(getSecNumbers(arr));


/**
 * task 2
 */

// function capitalizeWords(str) {
//     let words = str.split(" ");

//     for (let i = 0; i < words.length; i++) {
//         words[i] = words[i][0].toUpperCase() + words[i].slice(1);
//     }

//     return words.join(" ");
// }

// console.log(capitalizeWords("the quick brown fox"));



/**
 * task 3
 */


function displayPair(obj, parent = "") {
    for (let key in obj) {

        if (typeof obj[key] === "object") {
            displayPair(obj[key], parent + key + ".");
        } 
        else {
            console.log(parent + key + ": " + obj[key]);
        }
    }
}
let student = {
    name: "abdullah",
    age: 20,
    grades: {
        math: 90,
        network: 95
    },
    contactInfo: {
        email: "abdullah@gmail.com",
        phone: "01111111111"
    }
};

displayPair(student);


/**
 * task 4
 */


    // var library = {
    //     books: [
    //         {
    //             title: "The Hobbit",
    //             author: "Ali",
    //             year: 2023
    //         },
    //         {
    //             title: "Harry Potter",
    //             author: "Ahmed",
    //             year: 2014
    //         },
    //         {
    //             title: "The Alchemist",
    //             author: "Mohamed",
    //             year: 2026
    //         }
    //     ]
    // };

    // function printBooks(library) {

    //     for (var i = 0; i < library.books.length; i++) {
    //         console.log(library.books[i].title);
    //     }
    // }
    // printBooks(library);






/**
 * task 5
 */

// function applyOperation(num1, num2, operation) {
//     return operation(num1, num2);
// }

// function add(a,b){
//     return a+b;
// }

// function multiply(a, b) {
//     return a * b;
// }

// console.log(applyOperation(5, 3, add));
// console.log(applyOperation(5, 3, multiply));
// console.log(applyOperation(10, 2, (a, b) => a - b));
// console.log(applyOperation(10, 2, (a, b) => a / b));



/**
 * task 6
 */



// function processArray(arr, callback) {
//     for (let num of arr) {
//         console.log(callback(num));
//     }
// }

// function square(num) {
//     return num * num;
// }

// var numbers = [1, 2, 3, 4, 5];

// processArray(numbers, square);