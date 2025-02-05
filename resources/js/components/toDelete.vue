<template>
    <form @submit.prevent="registerAnswer" class="mainForm">
        <!--    Radio Select-->
        <div id="radioDiv">
            <p>Choose the food category you want:</p>
            <div class="labels">
                <label for="plant">Plants <input v-model="prelimRadio" name="theChoice" id="plant" type="radio"
                                                 value="plants"></label>
                <label for="fish">Fish <input v-model="prelimRadio" name="theChoice" id="fish" type="radio"
                                              value="fish"></label>
            </div>

            <div class="labels">
                <label for="meat">Meat <input v-model="prelimRadio" name="theChoice" id="meat" type="radio"
                                              value="meat"></label>
                <label for="bread">Bread <input v-model="prelimRadio" name="theChoice" id="bread" type="radio"
                                                value="bread"></label>
            </div>
        </div>

        <!--    Checked Select-->
        <div>
            <p>Select the delivery method:</p>
            <label class="m-4"><input type="checkbox" value="car" v-model="prelimChecked">Car</label>
            <label class="m-4"><input type="checkbox" v-model="prelimChecked" value="motorcycle">Motorcycle</label>
            <label class="m-4"><input type="checkbox" v-model="prelimChecked" value="bike">Bike</label>
        </div>

        <!--    Dropdown Select-->
        <div>
            <label for="selectITProduct">Select the desired IT Product:</label>
            <select id="selectITProduct" class="p-2" v-model="prelimSelect">
                <option value="" disabled>Choose an option</option>
                <option value="TV">TV</option>
                <option value="PC">PC</option>
                <option value="xBox">xBox</option>
                <option value="PlayStation">PlayStation</option>
            </select>
        </div>

        <!--    Multiple Select-->
        <div>
            <label for="selectHobbies">Select the desired hobbies:</label>
            <select multiple id="selectHobbies" class="p-2" v-model="prelimMultipleSelect">
                <option value="" disabled>Choose an option</option>
                <option value="Running">Running</option>
                <option value="Weights lifting">Weights lifting</option>
                <option value="Gaming">Gaming</option>
                <option value="Clubbing">Clubbing</option>
            </select>
        </div>

        <!--    Dynamic Select-->
        <div>
            <!--  <p v-for="(country,index) in countries " :key=index>{{ Object.keys(countryObj)[0] }}</p>-->
            <label for="dinamicCountrySelect">Selecteaza Țara:
                <select id="dinamicCountrySelect" v-model="prelimCountrySelect" @change="selectCities">
                    <option value="" disabled>Select a country</option>
                    <option v-for="(city, country) in countries" :key="country">{{ country }}</option>
                </select>
            </label>

            <label v-show="citiesList.length > 1" for="dinamicCitySelect">Selecteaza Orasul:
                <select id="dinamicCitySelect" v-model="prelimCitySelect">
                    <option value="" disabled>Select a city</option>
                    <option v-for="(city) in citiesList" :key="city">{{ city }}</option>
                </select>
            </label>
        </div>

        <!--    Input Select-->
        <input type="file" @change="updateFile">

        <!--    Color Select-->
        <div id="colorChoser">
            <input type="color" v-model="prelimColor">
            <p id="colorCode">{{ prelimColor }}</p>
        </div>

        <!--    Range Select-->
        <div id="rangeChoser">
            <input id="rangeInput" type="range" min="0" max="1000" step="0.1" v-model="prelimRange">
            <input style="width:70px" type="number" placeholder="Enter nr" v-model="prelimRange">
        </div>

        <!-- Date and Time Select -->
<!--        <input type="date" v-model="prelimDateYear">-->
<!--        <input type="time" v-model="prelimTime" lang="fr" step="3600">-->


        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Register</button>
    </form>

    <!--    Display Results-->
    <div v-show="radioChoice.length > 1">
        <p>Your food choice is: {{ radioChoice }}</p>
        <p>Your transport choice is: {{ checkedChoice }}</p>
        <p>Your IT product choice is: {{ selectChoice }}</p>
        <p>Your multiple hobbies are: {{ multipleSelect }}</p>
        <p>Your country of delivery is: {{ selectedCountry }}</p>
        <p>Your city of delivery is: {{ selectedCity }}</p>
        <p>Your uploaded file is: <img :src="fileRegistered"></p>

        <div id="colorDiv">
            <p>Your color is: {{ colorInput }} </p>
            <div ref="colorDiv"></div>
        </div>

        <p>The amount of money is: {{rangeInput}}</p>
        <p>The selected date is: {{dateYear}}</p>
        <p>The selected time is: {{time}}</p>

    </div>
</template>

<script>
export default {
    data() {
        return {
            prelimRadio: "",
            prelimChecked: [],
            prelimSelect: '',
            prelimMultipleSelect: [],

            prelimColor: '',
            colorInput: '',

            prelimRange:'',
            rangeInput: '',

            prelimDateYear:'',
            dateYear:'',

            prelimTime:'',
            time:'',

            radioChoice: '',
            checkedChoice: [],
            selectChoice: '',
            multipleSelect: '',

            //Selectul Dinamic:
            citiesList: [],
            prelimCitySelect: '',
            prelimCountrySelect: '',
            selectedCity: '',
            selectedCountry: '',

            countries: {
                Moldova: ['Chisinau', 'Balti', 'Tiraspol'],
                France: ['Lyon', 'Bordeaux', 'Marseille'],
                Switzerland: ['Basel', 'Bern', 'Lucerne'],

                //lucrulCuFileul
                fileRegistered: '',
            }
        }
    },
    methods: {

        registerAnswer() {
            this.radioChoice = this.prelimRadio;
            this.checkedChoice = this.prelimChecked;
            this.selectChoice = this.prelimSelect;
            this.multipleSelect = this.prelimMultipleSelect;
            this.selectedCity = this.prelimCitySelect;
            this.selectedCountry = this.prelimCountrySelect;

            this.colorInput = this.prelimColor;
            this.rangeInput = this.prelimRange;

            this.dateYear = this.prelimDateYear;
            this.time = this.prelimTime;

            this.$refs.colorDiv.style.backgroundColor = this.colorInput;
            this.$refs.colorDiv.style.width = '25px';
            this.$refs.colorDiv.style.height = '25px';

        },
        selectCities() {
            this.citiesList = this.countries[this.prelimCountrySelect];
            this.prelimCitySelect = "";
        },

        updateFile(event) {
            const file = event.target.files[0];
            if (file) {
                this.fileRegistered = URL.createObjectURL(file);
            }
        }
    }
}
</script>

<style scoped>
label {
    padding: 10px;
    border-radius: 10px;
}

input {
    margin: 10px;
}

label:hover {
    background-color: #a1a0a0;
    border-radius: 10px;
    cursor: pointer;

}

.mainForm {
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    align-items: center;
}

img {
    width: 100px;
}

#colorChoser {
    display: flex;
    position: relative;
}

#colorCode {
    position: relative;
    top: 12px;
}

#colorDiv {
    display: flex;
    gap: 10px;
}
#rangeInput{
    width:200px;
}
#rangeChoser{
    display: flex;
    position: relative;
}

</style>
