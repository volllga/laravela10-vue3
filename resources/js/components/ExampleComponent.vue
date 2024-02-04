<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
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

        components: {
            CounterComponent,
        }
    }
</script>
