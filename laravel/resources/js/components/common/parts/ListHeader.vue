<template>

    <div class="container-fluid">

        <page-title
            :header_icon="header_icon"
            :page_title="page_title"
        ></page-title>

        <div class="row mb-2">
            <div class="col-sm-12">
                <a :href="create_path" class="btn btn-primary">新規作成</a>
            </div>
        </div>

    </div><!-- /.container-fluid -->

</template>

<script>
    import PageTitle from "./PageTitle";

    export default {
        name: "ListPageHeader",

        components: {
            PageTitle
        },

        props: {
            header_icon: {
                default: null,
            },
            page_title: {
                default: null,
            },
            create_path: {
                default: null,
            }
        }
    }
</script>

<style scoped>

</style>
