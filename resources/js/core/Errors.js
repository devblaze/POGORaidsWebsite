class Errors {
    /**
     * Create a new Errors instance.
     */
    constructor() {
        this.errors = {};
    }


    /**
     * Retrive the error message for a field.
     *
     * @param {string} field
     */
    get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }

    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors){
        this.errors = errors;
    }

    clear(field){
        if (field) {
            delete this.errors[field]
            return;
        }
        this.errors = {};
    }

    /**
     * Determine if an errors exists for the given field.
     *
     * @parm {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    /**
     * Determine if we have any errors
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }
}

export default Errors;
