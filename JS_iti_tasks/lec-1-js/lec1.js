// -------------task1------------

// for(var i = 1; i <= 6; i++){
//     document.writeln(`<h${i}> this is header ${i} </h${i}>`);
// }




// --------------task2------------

// let n = parseInt(prompt("Enter the n number"));

// if (n > 0) {

//     let sum = 0;

//     for (let i = 0; i < n; i++) {

//         let num = parseInt(prompt("Enter number"));

//         if (num === 0) {
//             break;
//         }

//         sum += num;

//         if (sum >= 100) {
//             break;
//         }
//     }

//     document.writeln(`The result is ${sum}`);
// }




// -------------task3--------------

// let num = Number(prompt("Enter number"));

// if (num % 3 == 0 && num % 5 == 0) {
//     document.writeln("Fizz, Buzz");
// }
// else if (num % 3 == 0) {
//     document.writeln("Fizz");
// }
// else if (num % 5 == 0) {
//     document.writeln("Buzz");
// }
// else {
//     document.writeln("None");
// }


// -------------task4--------------

// let fly = confirm("Do you fly?");

// if (fly) {

//     let wild = confirm("Are you wild?");

//     if (wild) {
//         document.writeln("Eagle");
//     }
//     else {
//         document.writeln("Parrot");
//     }

// }
// else {

//     let undersea = confirm("Do you live undersea?");

//     if (undersea) {

//         let wild = confirm("Are you wild?");

//         if (wild) {
//             document.writeln("Shark");
//         }
//         else {
//             document.writeln("Dolphin");
//         }

//     }
//     else {

//         let wild = confirm("Are you wild?");

//         if (wild) {
//             document.writeln("Lion");
//         }
//         else {
//             document.writeln("Cat");
//         }

//     }
// }


// -------------task5------------

// let name;

// do {
//     name = prompt("Enter your name:");
// } while (!/^[A-Za-z ]+$/.test(name));


// let phone;

// do {
//     phone = prompt("Enter your phone number (8 digits):");
// } while (!/^\d{8}$/.test(phone));


// let mobile;

// do {
//     mobile = prompt("Enter your mobile number (11 digits):");
// } while (!/^(010|011|012)\d{8}$/.test(mobile));


// let email;

// do {
//     email = prompt("Enter your email:");
// } while (!/^[A-Za-z0-9._]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email));


// let color;

// do {
//     color = prompt("Choose a color: red, green or blue");
// } while (color !== "red" && color !== "green" && color !== "blue");


// let today = new Date();

// document.writeln(`
//     <h2>Welcome ${name}!</h2>

//     <p style="color:${color}">
//         Today is: ${today.toLocaleDateString()}
//     </p>

//     <p style="color:${color}">
//         Phone Number: ${phone}
//     </p>

//     <p style="color:${color}">
//         Mobile Number: ${mobile}
//     </p>

//     <p style="color:${color}">
//         Email: ${email}
//     </p>
// `);