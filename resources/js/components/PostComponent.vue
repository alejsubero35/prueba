<template>
    <div class="container">
        <h1> {{post.title}}</h1>

        {{post.updated_at}}

        By {{post.user.name }}

        <span v-if="post.published" class="badge badge-success" style="margin-left:15px;">Published</span>
        <span v-else class="badge badge-secondary" style="margin-left:15px;">Draft</span>

        <hr/>
        <p class="lead">
            {{ post.content }}
        </p>
        <hr/>

        <h3>Comments:</h3>
        <div style="margin-bottom:50px;" v-if="user.length !== 0">
            <textarea class="form-control" rows="3" name="body" placeholder="Leave a comment" v-model="commentBox" ></textarea>
            <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Send</button>
        </div>
        <div v-else>
            <h4>You must be logged in to submit a comment!</h4>
        </div>

        <div class="media" style="margin-top:20px;" v-for="comment in comments">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" :src="comment.user.avatar" alt="...">
                </a>
            </div>
            <div class="card w-75" style="height: 80px">
                <div class="card-body">
                    <h5 class="card-title">
                        {{comment.user.name}} at
                        <span style="color: #aaa; font-size: 10px;"> {{comment.created_at}}</span>
                    </h5>
                    <p class="card-text"> {{comment.body}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "postComponent",
        components: {
        },
        props: ['post', 'user'],
        data() {
            return {
                comments: {},
                commentBox: ''
            }
        },
        mounted() {
            console.log(this.user);
            this.getComments();
            this.listener();
        },
        methods: {
            getComments() {
                axios.get('/api/posts/'+this.post.id+'/comments')
                    .then((response) => {
                        this.comments = response.data
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            postComment() {
                axios.post('/api/posts/'+this.post.id+'/comment', {
                    body: this.commentBox,
                    api_token: this.user.api_token,
                })
                .then((response) => {
                    this.comments.unshift(response.data);
                    this.commentBox = '';
                })
                .catch((error) => {
                    console.log(error);
                })
            },
            listener() {
                Echo.channel('post-' + this.post.id)
                    .listen('CommentSent', (comment) => {
                        console.log("el comment aca:  "+comment)
                        this.comments.unshift(comment);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
