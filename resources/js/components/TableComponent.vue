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
            v-for="person in active"
            :key="person.id">
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
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
                <td>{{ person.position }}</td>
                <td>{{ person.active }}</td>
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
        return {
            persons: [
                {
                    id: 1,
                    name: 'Tom',
                    age: 34,
                    position: 'QA',
                    active: 1,
                },
                {
                    id: 2,
                    name: 'Ira',
                    age: 44,
                    position: 'SEO',
                    active: 1,
                },
                {
                    id: 3,
                    name: 'Rick',
                    age: 29,
                    position: 'Developer',
                    active: 1,
                },
                {
                    id: 4,
                    name: 'Martin',
                    age: 52,
                    position: 'Developer',
                    active: 0,
                },
            ]
        }
    },

    computed: {
        active() {
            return this.persons.filter((person) => person.active === 1);
        }
    },

    methods: {}
}

</script>
