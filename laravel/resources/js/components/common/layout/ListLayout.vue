<template>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">
                            <slot name="card_header"></slot>
                        </div><!-- /.card-header -->

                        <div class="card-body p-0">
                            <slot name="card_body"></slot>
                        </div><!-- /.card-body -->

                        <div class="card-footer clearfix">
                            <slot name="card_footer"></slot>
                        </div><!-- /.card-footer -->

                    </div><!-- /.card -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

        <slot name="modal"></slot>
    </section><!-- /.content -->
</template>

<script>
export default {
    name: "ListLayout"
}
</script>

<style scoped>

</style>
