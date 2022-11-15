<template>
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1>
                <i v-if="header_icon" :class="header_icon"></i> {{ page_title }}
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "PageTitle",

    props: {
        'header_icon': {
            default: null,
        },
        'page_title': {
            default: null,
        }
    }
}
</script>
