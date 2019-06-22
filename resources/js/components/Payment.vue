<template>
    <div>
        <form method="POST" v-if="loaded">
            <div id="dropin"></div>
        <button class="btn btn-primary" v-if="showSubmitButton">Complete</button>
        <input type="hidden" name="_token" v-bind:value="csrfToken">
    </form>
    <div v-else><p>Loading payment form</p> </div>
    </div>
    
</template>

<script>
import braintree from 'braintree-web'
export default {
    data () {
        return {
            loaded: false,
            showSubmitButton: false,
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content
        }
    },
    mounted() {
        axios.get('/braintree/token').then((response) => {
            this.loaded = true

            braintree.setup(response.data.data.token, 'dropin', {
                container: 'dropin',
                onReady: () => {
                    this.showSubmitButton = true
                }
            })
        })
       
    }
}
</script>
