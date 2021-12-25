<template>
<div>
    <h1>Detta är authorn</h1>
    <p>Parammen från vue router: {{this.$route.params.id}}</p>
    <ul>
        <li>Author/user: {{author.name}}</li>
        <li>Username: {{author.username}}</li>
    </ul>
    <p>Authorn har skrivit de här postsen:</p>
    <ul>
        <li v-for="post, index in posts" :key="index">
            <p>Titel: {{post.title}}</p>
            <p>Excerpt: {{post.excerpt}}</p>
        </li>
    </ul>
</div>

</template>

<script>
    export default {
        data: function(){
            return {
                author: {},
                posts: []            
            }
        },
         mounted: async function () {
            console.log("den fetchar");
            console.log(this.$route.params.id);
            let authorUnparsed = await fetch('/api/authors/' + this.$route.params.id);
            this.author = await authorUnparsed.json();
            this.posts = this.author.posts;
            
            console.log("Det här är author, ", this.author);
        }
    }
</script>

<style lang="scss" scoped>
    *{
        // background: black;
        // color:grey;
    }
    a{
        color: red;
    }
</style>