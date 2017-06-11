export default {
    Object: (value) => typeof value === "object",
    Function: (value) => typeof value === "function",
    Number: (value) => typeof value === "number",
    Boolean: (value) => typeof value === "boolean",
    String: (value) => typeof value === "string",
    Undefined: (value) => typeof value === "undefined",
    Symbol: (value) => typeof value === "symbol",
    Array: (value) => Array.isArray(value),
    Null: (value) => value === null,
    Promise: (value) => Promise.resolve(value) === value,
    Empty: (value) => value === "",
    notEmpty: (value) => value !== ""
}