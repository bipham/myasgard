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
                tableIsLoading: false
            };
        },
        methods: {
            queryServer() {
                axios.get(route('api.user.user.index'))
                    .then((response) => {
                        this.tableIsLoading = false;
                        this.data = response.data.data;
                        this.meta = response.data.meta;
                        this.links = response.data.links;
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
