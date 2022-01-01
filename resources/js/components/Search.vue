<template>
  <form v-on:submit="filterPosts" action="#" method="GET">
      <input v-model="searchString" type="text" name="frontend_search">
      <input type="submit" value="Frontendsök">
  </form>
</template>

<script>
export default {
    name: "Search",
    data: function() {
        return {
            'searchString': '',
        }
    },
    props: ['postList'],
    methods: {
        async filterPosts (e) {
            e.preventDefault();
            console.log("okej filtrerat");
            let test = await fetch("api/posts?searchString=" + this.searchString);
            let res = await test.json();
            console.log(res);
            // this.postList = [...res];
            this.$emit('update-list', [...res])
        }
    },
    mounted: function() {
    }
}
</script>

<style scoped>
    form{
        border: 1px solid red;
    }
</style>
