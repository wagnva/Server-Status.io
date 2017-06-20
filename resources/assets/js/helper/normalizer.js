import Validator from "./validator"
let store;

/**
 * Validates the parameter
 * @param params
 * @returns {boolean} true if there is an error
 */
function validate(params){
    if(Validator.Undefined(params.data)
        || Validator.Undefined(params.key)
        || Validator.Undefined(params.mutations)
        || Validator.Undefined(params.mutations.data)
        || Validator.Undefined(params.mutations.normalized)){
        console.warn("Normalizer.normalize() called with wrong/missing parameter");
        return true;
    }
    return false;
}

export default {
    setStore(_store){
        store = _store;
    },
    /**
     * Basic normalization
     * Replaces an array with objects with an array of their ids,
     * and creates a new array with the id as their keys.
     * Also pushed the data directly to the store
     * Assumes the following:
     * 1. the data, and the keydata are arrays.
     * 2. the identifying field of the keydata is called "id"
     * 3. this method is called before the data is added to the store (destroys reactivity otherwise)
     * @param params
     */
    normalize(params){
        if(validate(params)){return;}

        //this is where the normalized data is saved
        const normalizedData = [];

        //we assume the data is an array of objects
        params.data.forEach((element) => {
            //find the key in the element
            let data = element[params.key];

            //data is again an array of objects, that needs to be normalized
            //replace the data object with just the id value
            element[params.key] = data.map((dataElement) => {
                let id = dataElement.id;

                normalizedData.push(dataElement);

                return id;
            });
        });

        //now we just need to push the data to the store
        //push the main data
        store.commit(params.mutations.data, params.data);

        //push the normalized data (the data removed from the main data)
        normalizedData.forEach((element) => {
            store.commit(params.mutations.normalized, element);
        });
    }
}