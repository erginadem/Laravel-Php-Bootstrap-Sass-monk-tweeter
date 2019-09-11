<template>
    <div>
        <a href="#" class="badge badge-success badge-sm" @click="doLike">
            <i class="fa fa-thumbs-up"> {{ dataIsLiked ? 'Unlike' : 'Like' }} ({{ dataCount}})</i>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['count', 'tweetId', 'isLiked'],

        data () {
            return  {
                dataCount: 0,
                dataIsLiked: false
            }
        },

        mounted() {
            this.dataCount = this.count;
            this.dataIsLiked = this.isLiked;
        },

        methods: {
            doLike(e) {

                e.preventDefault();

                if(this.dataIsLiked) {
                    var url = '/tweets/'+ this.tweetId +'/unlike';

                } else {
                    var url = '/tweets/'+ this.tweetId +'/like';
                }

                // ajax request to the unlike route
                axios.post(url)
                    .then( (response) => {

                        if (response.data.status == 'success') {

                            if (this.dataIsLiked) {
                                // did unlike
                                this.dataCount--;
                                this.dataIsLiked = false;
                        } else {
                            // did like
                            this.dataCount++;
                            this.dataIsLiked = true;
                        }
                    }
                })
            }
        }
    }
</script>


<style>

</style>
