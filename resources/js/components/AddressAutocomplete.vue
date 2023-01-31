<template>
    <div class="input-group">

        <span class="input-group-text"><i class="fas fa-globe"></i></span>


        <input
            :ref="name+'_autocomplete'"
            :id="id"
            :name="fieldName"
            :placeholder="placeholder"
            class="form-control"
            @focus="geolocate()"
            type="text"

            v-on:keydown.enter.prevent
        />
    </div>
</template>

<script>
let placeSearch;

//binding fra dato e campo
const fields = {
     route: "address_id",
     street_number: "streetnumber_id",
     postal_code: "zipcode_id",
     locality: "city_id",
     administrative_area_level_1: "region_id",
     administrative_area_level_2: "province_id",
     administrative_area_level_3: "province_id",
     country: "country_id",
};
const fieldsCodes = {
    country: "country_code_id",
};

//binding del tipo di valore voluta da places
const componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    administrative_area_level_2: "short_name",
    administrative_area_level_3: "short_name",
    country: "long_name",
    postal_code: "short_name",
};
const componentFormCodes = {
    country: "short_name",
};

const editableFields = [
    'street_number',
    'route'
];


export default {

    props: [
        'name',
        'placeholder',

        'address_id',
        'streetnumber_id',
        'zipcode_id',
        'city_id',
        'province_id',
        'region_id',
        'country_id',
        'country_code_id',
        'address_lat',
        'address_lon',
    ],
    data: function () {
        return {
            wire: null,
            fieldName: this.name,
            fieldRef: this.name+'_autocomplete',
            id: this.name,
            autocomplete: null
        }
    },

    mounted() {
        google.maps.event.addDomListener(window, 'load', this.initializeAutocomplete());
        this.wire = this.$el.closest('div[wire\\:id]').getAttribute('wire:id');

    },

    methods: {

        initializeAutocomplete: function () {

                this.autocomplete = new google.maps.places.Autocomplete(
                    this.$refs[this.fieldRef],
                    {types: ["geocode"]}
                );

            this.autocomplete.setFields(["address_component","geometry"]);
            this.autocomplete.addListener("place_changed", this.fillInAddress);
            window.setTimeout(function() {
                this.$refs[this.fieldRef].setAttribute('autocomplete','new-password');
            }.bind(this), 1500);

        },

        geolocate: function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    const circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy,
                    });
                    this.autocomplete.setBounds(circle.getBounds());
                });
            }
        },

        fillInAddress: function() {
            const place = this.autocomplete.getPlace();
            //console.log(place);

            console.log(this.$props);
            //reset fields
            Object.values(fields).forEach(fieldId => {

                let field = document.getElementById(this.$props[fieldId]);
                if(field){
                    console.log(fieldId+' exists!');
                    field.value = '';
                }
            });

            this.$refs[this.fieldRef].value ='';

            for (const component of place.address_components) {
                const addressType = component.types[0];

                if (componentForm[addressType]) {
                    let fieldName = componentForm[addressType];
                    let fieldValue = component[fieldName];
                    let fieldId = fields[addressType];
                    let field = document.getElementById(this.$props[fieldId]);
                    if(field){
                        Livewire.find(this.wire).set(this.$props[fieldId],fieldValue);
                    }
                }
                if (componentFormCodes[addressType]) {
                    let fieldName = componentFormCodes[addressType];
                    let fieldValue = component[fieldName];
                    let fieldId = fieldsCodes[addressType];
                    let field = document.getElementById(this.$props[fieldId]);
                    if(field){
                        Livewire.find(this.wire).set(this.$props[fieldId],fieldValue);
                    }
                }
            }
            console.log(place);
            //let field = document.getElementById(this.$props[fieldId]);

            //Livewire.find(this.wire).set(this.$props['address_lat'],place.geometry.location.lat());
            //Livewire.find(this.wire).set(this.$props['address_lon'],place.geometry.location.lng());
        },

    }
}
</script>
