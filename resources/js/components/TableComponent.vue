<template>
    <div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Position</th>
            <th scope="col">Active</th>
        </tr>
        </thead>
        <tbody>
        <template
            v-for="user in active"
            :key="user.id">
<!--            Для тех, у кого ругается на строку  <tr v-for="person in persons" v-if="person.age >20">-->
<!--            Из документации к vue 3:-->
<!--            Обратите внимание, не рекомендуется использовать вместе v-if и v-for.-->
<!--            Когда они указаны вместе на одном узле, у v-if будет больший приоритет, чем у v-for. -->
<!--            И поэтому в условии v-if не будет доступа к переменным из области видимости v-for-->
<!--            Необходимо разнести эти v-for и v-if по разным узлам, например так:-->

<!--            <template v-for="person in persons">-->
<!--                <tr v-if="person.age > 20">-->
<!--                    ...-->
<!--                </tr>-->
<!--            </template>-->
            <tr>
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.age }}</td>
                <td>{{ user.position }}</td>
                <td>{{ user.active }}</td>
            </tr>
        </template>
        </tbody>
    </table>
    </div>
</template>

<script>

export default {
    name: 'TableComponent',

    components: {},

    data() {
    },

    computed: {
        active() {
            return this.users.filter((user) => user.active === 1);
        }
    },
    mounted() {
        this.getActiveUsers()
    },

    methods: {
        getActiveUsers()
        {
            axios.get('users')
                .then((response) => {
                    console.log(response)
                    this.users = response.data
                })
                .catch((error) => {
                    console.log(error)

                })
                .finally()
        }
    }
}

</script>
