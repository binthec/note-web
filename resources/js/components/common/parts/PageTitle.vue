<template>
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1>
                <i v-if="headerIcon" :class="headerIcon"></i> {{ pageTitle }}
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "PageTitle",

    props: {
        headerIcon: {
            default: null,
        },
        pageTitle: {
            default: null,
        }
    }
}
</script>
