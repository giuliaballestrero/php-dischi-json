const { createApp } = Vue

createApp({
    data() {
        return {
            apiUrl: './server.php',
            diskList: [],
            singleDisk: [],
            showDetailDisk: false


        }
    },
    methods: {
        getDisk() {
            axios.get(this.apiUrl).then((response) => {
                console.log(response.data);
                this.diskList = response.data;
            })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        },
        getDetailDisk(index) {
            const params = {
                diskIndex: index
            }

            axios.get(this.apiUrl, { params })
                .then(response => {
                    this.showDetailDisk = true;
                    this.singleDisk = response.data;
                })
        }
    },
    created() {
        this.getDisk();
    }
}).mount('#app')