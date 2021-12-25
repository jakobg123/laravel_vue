<template>
<div>
    <h1>About</h1>
    <ul>
        <li v-for="blog, index in blogs" v-bind:key="index">
            <h3>{{blog.title}}</h3>
            <p>{{blog.body}}</p>
            <p>Här är usern (som bytts till author): <router-link :to="'authors/' + blog.author.username">{{blog.author.name}}</router-link></p>
            <!-- <p>Här är usern (som bytts till author): <router-link :to="{path: 'authors'}">{{blog.author.name}}</router-link></p> -->
            <p>Här är kategorin: <a :href="'/category/' + blog.category.slug">{{blog.category.name}}</a></p>
        </li>
    </ul>
</div>

</template>

<script>
    export default {
        data: function(){
            return {
                blogs: []
            }
        },
         mounted: async function () {
            console.log("hejhejehj");
            let test = await fetch('api/posts');
            let res = await test.json();
            console.log(res);

            Object.values(res).map((val, idx)=> {
                this.blogs.push(val);
            });
            console.log("Det här är blogs, ", this.blogs);
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