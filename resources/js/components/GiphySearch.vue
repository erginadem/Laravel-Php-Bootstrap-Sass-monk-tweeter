<template>
    <div class="container">
        <div class="mb-2">
            <img :src="this.gif" alt="">
            <input type="hidden" name="gif" :value="this.gif" />
        </div>
        <div class="">
            <form  @submit.prevent="doSearch">
                <input v-model="query" type="text" placeholder="add gif"
                        class="form-control"
                />
                <button type="submit" class="badge badge-dark mt-2 mb-2">
                    <i class="fa fa-search"> search</i>
                </button>
            </form>
            <div class="col">
                <img
                    :src="result.images.fixed_height.url"
                    @click="choosenGIF(index)" v-for="(result , index) in results"
                    class="mb-1 mr-2"
                 />
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['value'],

    data() {
        return {
            appKey: 'Nm40IfiNHYRUHKH6xPkuljyfoFLnUfC9',
            query: '',
            results: [ ],
            gif:'' ,

        }
    },

    mounted() {
        if(this.value) {
            this.gif = this.value;
        }
    },

    methods: {

        doSearch() {
            axios.get('https://api.giphy.com/v1/gifs/search?api_key=' + this.appKey + '&q=' + this.query)
            .then( (response) => {
                this.results = response.data.data
            })
        },

        choosenGIF(index) {
            this.gif = this.results[index].images.fixed_height.url
        }
    },
}
</script>

<style lang="css" scoped>
</style>
