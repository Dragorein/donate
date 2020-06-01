<template>
<v-app>
    <navbar/>

    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="py-6">
                    <v-card>
                        <v-row>
                            <v-col md="6">
                                <v-card class="ma-6 mr-md-0">
                                    <v-card-title>Donasi Untuk: {{submission.submisi_judul}}</v-card-title>
                                    
                                    <v-list rounded dense three-line>
                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title>Penggalang</v-list-item-title>
                                                <div class="d-flex align-center pt-2">
                                                    <v-avatar left>
                                                        <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                                    </v-avatar>
                                                    <div class="mx-3">
                                                        <span class="green--text">{{submission.user_name}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></span>
                                                        <div class="caption">Identitas terverifikasi</div>
                                                    </div>
                                                </div>
                                            </v-list-item-content>
                                        </v-list-item>
                                        
                                        <v-divider class="my-1"></v-divider>

                                        <v-list-item>
                                            <v-list-item-content>
                                                <v-list-item-title>Penerima Manfaat</v-list-item-title>
                                                    <div class="d-flex align-center pt-2">
                                                        <v-avatar left>
                                                            <v-icon>mdi-account-circle mdi-48px</v-icon>
                                                        </v-avatar>
                                                        <div class="mx-3">
                                                            <span>{{submission.submisi_penerima}}</span>
                                                            <div class="caption">Sesuai dokumen medis<v-icon color="green">mdi-check-circle-outline mdi-18px</v-icon></div>
                                                        </div>
                                                    </div>
                                            </v-list-item-content>
                                        </v-list-item>
                                        
                                        <v-divider class="my-1"></v-divider>

                                        <v-list-item>
                                            <v-list-item-content class="d-flex px-2">
                                                <v-list-item-title>Cerita</v-list-item-title>
                                                <v-list-item-subtitle v-text="submission.submisi_cerita"></v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </v-list>
                                </v-card>
                            </v-col>
                            <v-col md="6">
                                <form class="ma-6 ml-md-0" method="post">
                                    <v-text-field label="Nama donatur" filled clearable name="name" type="text" v-model="payment.name" :error-messages="errors.payment.name" counter maxlength="30"></v-text-field>
                                    <v-text-field label="Email donatur" filled clearable name="email" type="text" v-model="payment.email" :error-messages="errors.payment.email"></v-text-field>
                                     <v-text-field label="Nomor Telepon" filled clearable name="phoneNumber" type="text" v-model="payment.phoneNumber" :error-messages="errors.payment.phoneNumber"></v-text-field>

                                    <v-list>
                                        <v-subheader>Pembayaran dengan</v-subheader>
                                        <v-list-item-group v-model="method" color="error">
                                            <v-list-item v-for="method in payment.methods" :key="method.title">
                                                <v-list-item-avatar tile>
                                                    <v-img :src="method.avatar"></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title v-text="method.title" name="tes" v-model="method.value"></v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list-item-group>
                                    </v-list>

                                    <v-text-field label="Nominal donasi" prefix="Rp " name="amount" type="text" v-model="payment.amount" :error-messages="errors.payment.amount" filled clearable></v-text-field>

                                    <div class="d-flex justify-center pt-2">
                                        <v-btn class="mr-2 w-50" @click="goBack">Batal</v-btn>
                                        <v-btn color="error" class="mr-2 w-50" @click="submit()">Lanjut</v-btn>
                                    </div>
                                </form>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-container>
            </section>
        </div>
    </main>

    <footbar/>
</v-app>
</template>

<script>
    export default {
        data: () => ({
            submission: {},
            payment: {
                name:"",
                email:"",
                amount:"",
                phoneNumber: "",
                methods: [
                    { title: 'BCA Virtual Account', avatar: '/icon/BCA.png', value:"BCA" },
                    // { title: 'BNI', avatar: '/icon/BNI.png',value:"BNI" },
                    // { title: 'Permata', avatar: '/icon/Permata.png', value:"Permata" },
                ],
            },
            errors: {
                payment:{},
            },
            message: {},
        }),
        created() {
            this.loadData();
        },
        methods: {
            submit() {
                axios
                .post("/api/donation", {
                    submisi: this.$route.params.id,
                    name: this.$data.payment.name,
                    email: this.$data.payment.email,
                    phoneNumber : this.$data.payment.phoneNumber,
                    amount: this.$data.payment.amount,
                })
                .then(data => {
                    this.$router.push({ path: '/payment/done/'+this.$route.params.id});
                })
                .catch(e => {
                    if (e.response.status == 422){
                        this.$data.errors.payment = e.response.data.errors;
                        this.$data.message = "";
                    }
                });
            },
            submitForm(e) {
                e.preventDefault();
            },
            loadData() {
                axios
                .get("/api/DataSubmision/"+this.$route.params.id)
                .then(response => {
                    this.$data.submission = response.data.submission;
                });
            },
            reroutes: function (url) {
                this.$router.push({ path: url });
            },
            goBack: function () {
                this.$router.go(-1);
            }
        }
    }
</script>
