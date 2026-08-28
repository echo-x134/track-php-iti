/**
 * slice
 * arr.slice(start, end)
 * باخد جزء من ال array
 */
let arr = [10, 20, 30, 40, 50];

let result = arr.slice(1, 4);

console.log(result);

/**
 * splice
 * عشان إضافة أو حذف أو استبدال عناصر داخل الـ Array
 * start        → أبدأ منين؟
  deleteCount  → احذف كام عنصر؟
  item1...     → أضيف إيه؟
 */
let arr = [10, 20, 30, 40, 50];

arr.splice(1, 2);

console.log(arr);