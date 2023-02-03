<template>

    <div class="container-fluid">
        <page-title
            :header-icon="headerIcon"
            :page-title="pageTitle"
        ></page-title>

        <div class="row mb-2" v-if="createPath">
            <div class="col-sm-12">
                <a :href="createPath" class="btn btn-primary">新規作成</a>
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
        headerIcon: {
            default: null,
        },
        pageTitle: {
            default: null,
        },
        createPath: {
            default: null,
        }
    }
}
</script>

<style scoped>

</style>
