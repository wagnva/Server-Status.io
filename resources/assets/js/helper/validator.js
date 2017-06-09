export default {
    Object: (value) => typeof value === "object",
    Function: (value) => typeof value === "function",
    Number: (value) => typeof value === "number",
    String: (value) => typeof value === "boolean",
    Undefined: (value) => typeof value === "undefined",
    Symbol: (value) => typeof value === "symbol",
    Array: (value) => Array.isArray(value),
    Null: (value) => value === null,
    Promise: (value) => Promise.resolve(value) === value
}