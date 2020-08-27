import Errors from './Errors';

class Form {
    /**
     * Create a new Form Instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data){
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    /**
     * Fetch all the relevant data for the form.
     */
    data() {
        let data = {};

        for (let propertry in this.originalData){
            data[propertry] = this[propertry];
        }

        /*        let data = Object.assign({}, this);
                delete data.originalData;
                delete data.errors;*/
        return data;
    }

    /**
     * Submit form for a post request.
     *
     * @param {string} url
     */
    post(url){
        return new Promise((resolove, reject) => {
            axios.post(url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolove(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    reject(error.response.data);
                })
        });
    }

    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    reject(error.response.data);
                })
        });
    }

    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess(data) {
        alert(data.message);
        this.reset();
    }

    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
        this.errors.record(errors);
    }

    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData){
            this[field] = '';
        }
        this.errors.clear();
    }
}

export default Form;
