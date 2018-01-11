<template>
    <div>
        {{ data }}
    </div>
</template>

<script>
    import axios from 'axios';
    import _ from 'lodash';
    import ShortcutHelper from '../../../../Core/Assets/js/mixins/ShortcutHelper';

    export default {
        mixins: [ShortcutHelper],
        data() {
            return {
                data: [],
                tableIsLoading: false,
            };
        },
        methods: {
            queryServer() {
                axios.get(route('admin.product.products.index'))
                    .then((response) => {
                        console.log(response);
                        this.tableIsLoading = false;
                        this.data = response.data.data;
                    });
            },
            fetchData() {
                this.tableIsLoading = true;
                this.queryServer();
            }
        },
        mounted() {
            this.fetchData();
        },
    };
</script>
