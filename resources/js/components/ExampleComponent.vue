<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h4 class="text-body-emphasis">
                            Hello <mark>{{ name }}</mark>!
                            <br>
                            Nice to meet you in <mark>{{ cities.residence }}</mark>
                        </h4>
                        I'm an example component.
                    </div>
                    <CounterComponent></CounterComponent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CounterComponent from './CounterComponent.vue';

export default {
    name: 'ExampleComponent',

    components: {
        CounterComponent,
    },

    data() {
        return {
            active: true,
            name: 'Ivan',
            age: 33,
            cities: {
                homeCity: 'Berlin',
                residence: 'Prague',
            },
            numbers: [1, 2, 3],
        }
    },
}


</script>
