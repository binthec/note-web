<template>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">


            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i v-if="header_icon" :class="header_icon"></i> {{ header_title }}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <button class="btn btn-primary">新規作成</button>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
export default {
    name: "PageHeader",

    props: {
        'header_icon': {
            default: null,
        },
        'header_title': {
            default: null,
        }
    }
}
</script>

<style scoped>

</style>
