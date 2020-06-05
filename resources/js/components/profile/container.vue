<template>
<v-app>
    <navbar/>
    <alert :message="message" color="green lighten-5" colorIcon="success" colorText="success--text" v-if="message"/>
    <main class="h-100">
        <div class="fluid">
            <section class="top-space bg-section-1">
                <v-container class="pb-12">
                    <v-card>
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-card-text>
                                    <div class="d-flex align-center mx-4 mr-md-0">
                                        <v-avatar size="96" left>
                                            <img :src="'storage/profile/'+currentUser.user_foto">
                                        </v-avatar>
                                        <div class="mx-3">
                                            <v-card-title class="headline font-weight-bold pb-6">{{currentUser.user_name}}<v-icon right color="green">mdi-check-circle mdi-18px</v-icon></v-card-title>
                                            <v-card-subtitle>Identitas terverifikasi</v-card-subtitle>
                                        </div>
                                    </div>
                                </v-card-text>
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-card flat color="error" dark class="mx-4 ml-md-0">
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="12" md="auto">
                                                <v-card-subtitle class="py-1">Total Mendonasikan</v-card-subtitle>
                                                <v-card-title class="headline font-weight-bold py-1">Rp {{participation.total_donation}}</v-card-title>
                                            </v-col>
                                            <v-col cols="12" md="auto">
                                                <v-card-subtitle class="py-1">Pasien terdonasikan</v-card-subtitle>
                                                <v-card-title class="headline font-weight-bold py-1">{{participation.total_participant}}</v-card-title>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-container>
            </section>

            <section class="bg-section-2">
                <v-container class="py-12">
                    <v-card>
                        <v-tabs show-arrows vertical hide-slider background-color="error">
                            <v-tab>
                                <v-icon left>mdi-account</v-icon>Penggalangan Aktif
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-charity</v-icon>Riwayat Penggalangan
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-history</v-icon>Riwayat Donasi
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-bank</v-icon>Pencairan Dana
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-account-edit</v-icon>Ubah Profil
                            </v-tab>
                            <v-tab>
                                <v-icon left>mdi-textbox-password</v-icon>Ganti Password
                            </v-tab>

                            <v-tab-item>
                                <v-card-title>Penggalangan Aktif</v-card-title>
                                <v-card-subtitle>Menampilkan semua penggalangan dana-mu yang sedang aktif.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="active in submisisactive">
                                        <v-list-item >
                                            <v-list-item-avatar tile size="70" width="120" @click="reroutes('/campaign/'+active.submisi_id)">
                                                <v-img :src="'/storage/profile/'+active.submisi_foto"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="active.submisi_judul"></v-list-item-title>
                                                <v-list-item-subtitle>Aktif</v-list-item-subtitle>
                                                <v-list-item-subtitle v-html="active.sisa_hari + ' hari lagi'"></v-list-item-subtitle>
                                            </v-list-item-content>

                                            <v-list-item-content>
                                                <v-btn color="error" @click="callCloseSubmisi(active.submisi_id)">Tutup</v-btn>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                </v-list>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Riwayat Penggalangan</v-card-title>
                                <v-card-subtitle>Menampilkan semua riwayat penggalangan dana yang sudah kamu buka, mulai dari yang aktif sampai yang sudah tutup.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="history in submisishistory">
                                        <v-list-item @click="reroutes('/campaign/'+history.submisi_id)">
                                            <v-list-item-avatar tile size="70" width="120">
                                                <v-img :src="'/storage/submission/'+history.submisi_foto"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="history.submisi_judul"></v-list-item-title>
                                                <v-list-item-subtitle>Ditutup</v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                    <v-pagination color="error" v-model="page" :length="lengthHistorySubmission" :page="page" :total-visible="totalVisible" @input="getDataPage(currentUser.user_id,page)"></v-pagination>
                                </v-list>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Riwayat Donasi</v-card-title>
                                <v-card-subtitle>Menampilkan semua riwayat donasi yang telah kamu salurkan.</v-card-subtitle>
                                <v-list two-line>
                                    <template v-for="donation in donations">
                                        <v-list-item @click="reroutes('/campaign/'+donation.submisi_id)">
                                            <v-list-item-avatar tile size="70" width="120">
                                                <v-img :src="'/storage/submission/' +donation.submisi_foto"></v-img>
                                            </v-list-item-avatar>
                                            
                                            <v-list-item-content>
                                                <v-list-item-title v-html="donation.submisi_judul"></v-list-item-title>
                                                <v-list-item-subtitle v-html="'Dibuka oleh ' + donation.user_name + ' - ' + donation.sisa_hari+' hari lagi'"></v-list-item-subtitle>
                                            </v-list-item-content>
                                        </v-list-item>
                                    </template>
                                    <v-pagination color="error" v-model="page" :length="lengthHistoryDonation" :page="page" :total-visible="totalVisible" @input="getDataPage(currentUser.user_id,page)"></v-pagination>
                                </v-list>
                            </v-tab-item>
                             <v-tab-item>
                                <v-card-title>Pencairan Dana</v-card-title>
                                <v-card-subtitle>Menampilkan Pencairan data yang akan di proses</v-card-subtitle>
                                <v-form :value="csrf">
                                    <v-container class="px-12 pb-12">
                                        <v-select name="totalrequestmoney" label="Pilih Penggalangan Dana" v-model="selected" prepend-inner-icon="mdi-charity" required outlined clearable></v-select>
                                        <v-text-field label="Jumlah Pencairan Dana" name="totalrequestmoney" prepend-inner-icon="mdi-numeric" type="text" required outlined clearable/>
                                        <v-text-field label="Bank" name="bankname" prepend-inner-icon="mdi-bank" type="text" required outlined clearable/>
                                        <v-divider/>
                                        <v-btn color="error" class="mr-2" @click="">Proses</v-btn>
                                        <v-btn text class="mr-2">Batal</v-btn>
                                    </v-container>
                                </v-form>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Ubah Profil</v-card-title>
                                <v-card-subtitle></v-card-subtitle>
                                <v-form :value="csrf">
                                    <v-container class="px-12 pb-12">
                                        <div class="d-flex align-center mb-4">
                                            <v-avatar size="96" left>
                                                <img :src="'storage/profile/'+currentUser.user_foto">
                                            </v-avatar>
                                            <v-card-subtitle>Maksimal ukuran foto 1MB. Disarankan beresolusi 180px x 180px.</v-card-subtitle>
                                        </div>
                                        <v-file-input label="Foto Profil" prepend-icon="" prepend-inner-icon="mdi-paperclip" accept="image/png, image/jpeg, image/bmp" v-model="update.image" type="file" filled outlined clearable/>
                                        <v-divider/>
                                        <v-text-field label="Nama Depan" name="firstname" prepend-inner-icon="person" type="text" v-model="update.firstName" :error-messages="errors.firstName"  required outlined clearable/>
                                        <v-text-field label="Nama Belakang" name="lastname" prepend-inner-icon="person" type="text" v-model="update.lastName" :error-messages="errors.lastName" required outlined clearable/>
                                        <v-text-field label="Email" name="email" prepend-inner-icon="mail" type="text" v-model="update.email" readonly required outlined/>
                                        <v-text-field label="Nomor Handphone" name="noHandphone" prepend-inner-icon="phone" v-model="update.phoneNumber" type="text" :error-messages="errors.phoneNumber" :counter="14" required outlined clearable/>
                                        <v-divider/>
                                        <v-btn color="error" class="mr-2"  @click="callSubmitUpdateProfile()">Ganti</v-btn>
                                        <v-btn text class="mr-2">Batal</v-btn>
                                    </v-container>
                                </v-form>
                            </v-tab-item>
                            <v-tab-item>
                                <v-card-title>Ganti Password</v-card-title>
                                <v-card-subtitle></v-card-subtitle>
                                <v-form>
                                    <v-container class="px-12 pb-12">
                                            <v-alert type="error" text dense transition="slide-y-transition"  v-if="messageoldpassword">{{messageoldpassword}}</v-alert>
                                            <v-text-field id="oldpassword" label="Password Saat Ini"  name="oldpassword" :error-messages="errors.oldpassword" prepend-inner-icon="mdi-lock-question" v-model="updatePassword.oldpassword" type="password" required outlined clearable/>
                                            <v-text-field id="newpassword" label="Password Baru" name="newpassword" :error-messages="errors.newpassword"  prepend-inner-icon="mdi-lock-open" type="password" v-model="updatePassword.newpassword" required outlined clearable/>
                                            <v-text-field id="passwordconfirm" label="Ketik Ulang Password Baru" :error-messages="errors.confirmpassword" name="passwordconfirm" prepend-inner-icon="lock" type="password" v-model="updatePassword.confirmpassword" required outlined clearable/>
                                        <v-divider/>
                                        <v-btn color="error" @click=" callSubmitUpdatePassword()" class="mr-2">Ganti</v-btn>
                                        <v-btn text class="mr-2">Batal</v-btn>
                                    </v-container>
                                </v-form>
                            </v-tab-item>
                        </v-tabs>
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
            actives: [],
            selected:"",
            submisishistory: [],
            submisisactive: [],
            donations:[],
            participation:[],
            errors:[],
            message:"",
            messageoldpassword:"",
            update: {
                firstName: "",
                lastName: "",
                email: "",
                phoneNumber: "",
                image: undefined,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            updatePassword: {
                oldpassword: "",
                newpassword: "",
                confirmpassword: "",
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            lengthHistoryDonation: 0,
            lengthHistorySubmission: 0,
            nextIcon: 'navigate_next',
            prevIcon: 'navigate_before',
            page: 1,
            totalVisible: 10,
            valid: true,
        }),
         computed: {
            loggedin: {
                get() {
                    return this.$store.state.user.loggedin;
                }
            },
            currentUser: {
                get() {
                    return this.$store.state.user.user;
                    this.loadData();
                }
            },
        },
        watch: {
            currentUser:function (value) {
                this.$data.update.firstName = this.currentUser.user_name.split(" ")[0];
                this.$data.update.lastName = this.currentUser.user_name.split(" ")[1];
                this.$data.update.phoneNumber = this.currentUser.user_phone;
                this.$data.update.email = this.currentUser.user_mail;
                this.loadData(this.currentUser.user_id);
            },
        },
        methods: {
            callSubmitUpdateProfile() {
                let temp = this.$data.update
                let formData = new FormData()
                formData.append('id', this.currentUser.user_id)
                formData.append('firstName', temp.firstName)
                formData.append('lastName', temp.lastName)
                formData.append('phoneNumber', temp.phoneNumber)
                formData.append('image', temp.image)
                formData.append('token', temp.csrf)
                axios
                .post("/auth/updateProfile", formData, {
                    headers: {
                        'accept': 'application/json',
                        'Accept-Language': 'en-US,en;q=0.8',
                        'Content-Type': `multipart/form-data`,
                    }
                })
                .then(response=> {
                    this.reloadPage();
                    this.message = "Berhasil Perbarui Akun!";
                })
                .catch(e => {
                    this.errors = e.response.data.errors;
                })
            },
            callSubmitUpdatePassword() {
                let temp = this.$data.updatePassword
                let formData = new FormData()
                formData.append('id', this.currentUser.user_id)
                formData.append('oldpassword', temp.oldpassword)
                formData.append('newpassword', temp.newpassword)
                formData.append('confirmpassword', temp.confirmpassword)
                formData.append('email', this.currentUser.user_mail)
                formData.append('token', temp.csrf)
                axios
                .post("/auth/ChangePassword", formData, {
                    headers: {
                        'accept': 'application/json',
                        'Accept-Language': 'en-US,en;q=0.8',
                        'Content-Type': `multipart/form-data`,
                    }
                })
                .then(response => {
                    if(response.data.response == "BAD"){
                        this.$data.messageoldpassword = "Tolong Periksa Password Lama anda, Pastikan diisi dengan benar!";
                    }else{
                        this.reloadPage();
                        this.message = "Berhasil Menganti Password Akun!";
                    }
                })
                .catch(e => {
                    this.errors = e.response.data.errors;
                })
            },
            callCloseSubmisi(id) {
                axios.post("/api/CloseSubmisi/"+id)
                .then(response => {
                    this.reloadPage();
                    this.message = "Berhasil Menutup Penggalangan Dana!";
                })
                .catch(e => {
                    console.log(e);
                })
            },
            loadData(id) {
                axios.get("/api/getProfileInformation/"+id).then(response => {
                    this.donations = response.data.donations.data;
                    this.submisishistory = response.data.submissionhistory.data;
                    this.submisisactive = response.data.submissionactive;
                    this.participation = response.data.participations[0];
                    this.lengthHistoryDonation = response.data.donations.last_page;
                    this.lengthHistorySubmission = response.data.submissionhistory.last_page;
                });
            },
            getDataPage(id,toPage) {
                axios.get("/api/getProfileInformation/"+id+"?page="+toPage).then(response => {
                    this.donations = response.data.donations.data;
                    this.submisishistory = response.data.submissionhistory.data;
                    this.submisisactive = response.data.submissionactive;
                    this.participation = response.data.participations[0];
                    this.lengthHistoryDonation = response.data.donations.last_page;
                    this.lengthHistorySubmission = response.data.submissionhistory.last_page;
                });
            },
            reloadPage(){
                window.location.reload()
            },
            reroutes: function (url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>

<style>
    section .v-card {
        transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1) all;
    }

    section .card-transform:hover {
        transform: translatey(-10px);
    }

    .top-space {
        padding-top: 96px!important;
    }

    .v-btn:focus {
        outline: 0;
    }
    
    a.v-btn:hover, .v-chip:hover {
        text-decoration: none;
    }

    .v-tabs--vertical .v-tab {
        justify-content: start;
    }

    @media only screen and (max-width: 768px) {
        .v-tabs--vertical {
            flex-direction: column;
        }
    }
    /*@import './assets/styles/yourstyles.css';*/
</style>