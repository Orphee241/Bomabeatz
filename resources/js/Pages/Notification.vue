<template>
    <Head title="Notification" />
    <div className="header2"></div>
    <div className="container-fluid px-5">
        <div style class="container section1">
            <div class="alert-body alert alert-danger">
                <h2 style="color: rgb(39, 19, 85); font-weight: 800">
                    Le paiement a échoué. Une erreur s'est produite, veuillez
                    réessayer en cliquant
                    <a
                        href="#"
                        style="color: black"
                        onclick="history.back();return false;"
                        >ici</a
                    >
                </h2>
            </div>
            <div style="margin-top: 35.5em" class="row"></div>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    props: {
        beatmakers: Object,
    },
    components: {
        Head,
        Link,
    },
};
</script>
<script setup>
import { usePage, Inertia } from "@inertiajs/inertia-vue3";

const page = usePage();

/* 
const paymentRedirect = ()=>{
Inertia.back()
} */
</script>
