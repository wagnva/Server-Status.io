export default {
    /**
     * Array find helper method that works with Vue reactivity.
     *
     * @param array The array that gets tested
     * @param test The test function. First param is the element. The first element where this function is true is returned
     * @returns {{}} an empty Object when nothing was found
     */
    find(array, test){
        return array.filter(element => {
            return !test(element);
        })[0] || {};
    }
}