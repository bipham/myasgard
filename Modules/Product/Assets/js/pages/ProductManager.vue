<template>
    <div>
        <h6>hello</h6>
        <b-button></b-button>
        <el-table
                :data="data"
                :default-sort = "{prop: 'id', order: 'descending'}"
                style="width: 100%">
            <el-table-column
                    prop="id"
                    label="ID"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="category_id"
                    label="Category_ID"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="name"
                    label="Name"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="description"
                    label="Description"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="price"
                    label="Price"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="sale_price"
                    label="Sale_price"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="stock"
                    label="Stock"
                    sortable>
            </el-table-column>
            <el-table-column
                    label="Image">
                    <template slot-scope="scope">
                        <img :src=scope.row.image_feature />
                    </template>
            </el-table-column>
            <el-table-column
                    prop="object"
                    label="Object"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="is_published"
                    label="is_published"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    label="created_at"
                    sortable>
            </el-table-column>
            <el-table-column
                    prop="updated_at"
                    label="updated_at"
                    sortable>
            </el-table-column>
        </el-table>
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
                axios.get(route('api.product.product.index'))
                    .then((response) => {
                        console.log(response.data);
                        this.tableIsLoading = false;
                        this.data = response.data;
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
