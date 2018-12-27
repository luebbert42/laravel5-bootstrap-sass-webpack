<template>
       <span class="m-r-large">
                  <button class="btn btn-sm btn-default" type="reset" @click="resetForm" >Zurücksetzen</button>
       </span>
</template>

<script>
    export default {
        props: ['formname'],
        data () {
            return {
            }
        },
        methods: {
            resetForm: function(e) {
                let elements = document.forms[this.formname].getElementsByTagName("input");
                let i;
                for (i = 0; i < elements.length; i++) {
                    if (elements[i].type == "checkbox") {
                        elements[i].checked = false;
                    }
                    else if (elements[i].type == "text") {
                        elements[i].value = "";
                    }
                }
                elements = document.forms[this.formname].getElementsByTagName("select");
                for (i = 0; i < elements.length; i++) {
                    elements[i].selectedIndex = null;
                }
                event.preventDefault();
            }
        },
    }
</script>

