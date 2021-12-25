<template>
<div class="Outer">
    <h1 class="Outer__Title">osadskej då</h1>
    <h2>{{texten}}</h2>
    <ul>
        <li v-for="element, index in list" v-bind:key="index">{{ element }}</li>
    </ul>
</div>
</template>

<script>
    export default {
        data: function () {
            return {
                texten: "",
                list: []
            }
        },
        mounted: async function () {
            console.log("hejhejehj");
            let test = await fetch('api/sak');
            let res = await test.json();
            console.log(res);
            this.texten = res.val;

            Object.values(res).map((val, idx)=> {
                idx != 0 && this.list.push(val);
            });

            test = await fetch('api/posts');
            res = await test.json();
            console.log(res);
            test = await fetch('api/users');
            res = await test.json();
            console.log(res);
        }
    }
</script>

<style lang="scss" scoped>
    .Outer{
        &__Title{
            color: mediumaquamarine;
        }
    }
</style>