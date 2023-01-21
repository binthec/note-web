<template>
    <div class="card-footer" v-show="hasManyPages">
        <ul class="pagination pagination-md m-0">
            <li class="page-item">
                <button class="page-link" @click="goPage('prev')" :disabled="isFirstPage">前</button>
            </li>
            <li class="page-item" v-for="page_num in list.last_page" :key="page_num"
                :class="{ active: isActive(page_num) }">
                <a class="page-link" href="javascript: void(0);" @click="goPage(page_num)">{{ page_num }}</a>
            </li>
            <li class="page-item">
                <button class="page-link" @click="goPage('next')" :disabled="isLastPage">次</button>
            </li>
        </ul>
    </div>
</template>

<script>

import {mapState, mapMutations, mapActions} from "vuex";

export default {
    name: "Paginator",

    props: {
        list: {
            default: {},
        },
        setCurrentPage: {
            default: () => {}
        },
    },

    computed: {
        isFirstPage() {
            return this.list.current_page == 1;
        },

        isLastPage() {
            return this.list.last_page == this.list.current_page;
        },

        hasManyPages() {
            return this.list.total > this.list.per_page;
        },

        isActive() {
            return (page_num) => {
                return this.list.current_page == page_num;
            }
        }
    },

    methods: {
        goPage(page_num) {
            let num = 1;
            if (page_num === 'next') {
                num = this.list.current_page + 1;
            } else if (page_num === 'prev') {
                num = this.list.current_page - 1;
            } else {
                num = page_num;
            }
            this.setCurrentPage({current_page: num});
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../../../sass/variables";

.pagination {
    justify-content: center;

    button:disabled{
        color: $disabled-gray;
    }
}
</style>
