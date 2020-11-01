<template>
    <div>
        <div class="content">
            <div class="container-fluid">
                <div class="row"></div>
                <!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
                <div
                    class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20"
                >
                    <p class="_title0">
                        Documents

                        <v-dialog v-model="dialog" persistent max-width="600px">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    small
                                    class="ml-3"
                                    color="green darken-3"
                                    dark
                                    @click="addDocumentDialog"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon>mdi-text-box-plus</v-icon>Upload
                                    Documents
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span v-show="!editmode" class="headline"
                                        >Upload Document</span
                                    >
                                    <span v-show="editmode" class="headline"
                                        >Edit Document</span
                                    >
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.name"
                                                    label="Document Name *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Document Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.country"
                                                    label="Country Name *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Country Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.subject"
                                                    label="Subject *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Subject is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-autocomplete
                                                    :items="[
                                                        'MoU',
                                                        'Agreement'
                                                    ]"
                                                    v-model="data.documentType"
                                                    label="Select Document Type"
                                                    outlined
                                                    color="green darken-4"
                                                    data-vv-name="select"
                                                ></v-autocomplete>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-autocomplete
                                                    :items="[
                                                        'Pending',
                                                        'Ongoing',
                                                        'Approved'
                                                    ]"
                                                    v-model="data.status"
                                                    label="Status of Document"
                                                    outlined
                                                    color="green darken-4"
                                                    data-vv-name="select"
                                                ></v-autocomplete>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.years"
                                                    label="Year *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Year is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" v-show="!editmode">
                                                <v-textarea
                                                    v-model="data.remarks"
                                                    outlined
                                                    color="green darken-4"
                                                >
                                                    <template v-slot:label>
                                                        <div>
                                                            Document Remark
                                                            <small
                                                                >(optional)</small
                                                            >
                                                        </div>
                                                    </template>
                                                </v-textarea>
                                            </v-col>

                                            <v-col
                                                v-show="!editmode"
                                                cols="12"
                                                sm="12"
                                                md="12"
                                            >
                                                <Upload
                                                    multiple
                                                    ref="uploads"
                                                    :headers="{
                                                        'x-csrf-token': token,
                                                        'X-Requested-With':
                                                            'XMLHttpRequest'
                                                    }"
                                                    :on-success="handleSuccess"
                                                    :on-error="handleError"
                                                    :format="['pdf']"
                                                    :max-size="6144"
                                                    :on-format-error="
                                                        handleFormatError
                                                    "
                                                    :on-exceeded-size="
                                                        handleMaxSize
                                                    "
                                                    type="drag"
                                                    action="api/upload_document"
                                                >
                                                    <div
                                                        style="padding: 20px 0"
                                                    >
                                                        <Icon
                                                            type="ios-cloud-upload"
                                                            size="52"
                                                            style="color #3399ff"
                                                        ></Icon>
                                                        <p>
                                                            Click or drag here
                                                            to upload document
                                                        </p>
                                                    </div>
                                                </Upload>

                                                <div
                                                    class="demo-upload-list"
                                                    v-if="data.document"
                                                >
                                                    <img
                                                        :src="
                                                            `${data.document}`
                                                        "
                                                    />
                                                    <div
                                                        class="demo-upload-list-cover"
                                                        v-show="!editmode"
                                                    >
                                                        <Icon
                                                            type="ios-trash-outline"
                                                            @click.prevent="
                                                                deleteFile()
                                                            "
                                                        ></Icon>
                                                    </div>
                                                </div>
                                            </v-col>

                                            <!-- For Edit Modal-->
                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.name"
                                                    label="Document Name *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Document Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.country"
                                                    label="Country Name *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Country Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.subject"
                                                    label="Subject *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Subject is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-autocomplete
                                                    :items="[
                                                        'MoU',
                                                        'Agreements'
                                                    ]"
                                                    v-model="
                                                        editData.documentType
                                                    "
                                                    label="Select Document Type"
                                                    outlined
                                                    color="green darken-4"
                                                    data-vv-name="select"
                                                ></v-autocomplete>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-autocomplete
                                                    :items="[
                                                        'Pending',
                                                        'Ongoing',
                                                        'Approved'
                                                    ]"
                                                    v-model="editData.status"
                                                    label="Status of Document"
                                                    outlined
                                                    color="green darken-4"
                                                    data-vv-name="select"
                                                ></v-autocomplete>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.years"
                                                    label="Year *"
                                                    color="green darken-4"
                                                    outlined
                                                    hint="Year is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" v-show="editmode">
                                                <v-textarea
                                                    v-model="editData.remarks"
                                                    outlined
                                                    color="green darken-4"
                                                >
                                                    <template v-slot:label>
                                                        <div>
                                                            Document Remark
                                                            <small
                                                                >(optional)</small
                                                            >
                                                        </div>
                                                    </template>
                                                </v-textarea>
                                            </v-col>

                                            <v-col
                                                v-show="editmode"
                                                cols="12"
                                                sm="12"
                                                md="12"
                                            >
                                                <Upload
                                                    v-show="isDocumentNew"
                                                    multiple
                                                    ref="editDataUploads"
                                                    :headers="{
                                                        'x-csrf-token': token,
                                                        'X-Requested-With':
                                                            'XMLHttpRequest'
                                                    }"
                                                    :on-success="handleSuccess"
                                                    :on-error="handleError"
                                                    :format="['pdf']"
                                                    :max-size="6144"
                                                    :on-format-error="
                                                        handleFormatError
                                                    "
                                                    :on-exceeded-size="
                                                        handleMaxSize
                                                    "
                                                    type="drag"
                                                    action="api/upload_document"
                                                >
                                                    <div
                                                        style="padding: 20px 0"
                                                    >
                                                        <Icon
                                                            type="ios-cloud-upload"
                                                            size="52"
                                                            style="color #3399ff"
                                                        ></Icon>
                                                        <p>
                                                            Click or drag here
                                                            to upload document
                                                        </p>
                                                    </div>
                                                </Upload>

                                                <div
                                                    class="demo-upload-list"
                                                    v-if="editData.document"
                                                >
                                                    <img
                                                        :src="
                                                            `${editData.document}`
                                                        "
                                                    />
                                                    <div
                                                        class="demo-upload-list-cover"
                                                        v-show="!editmode"
                                                    >
                                                        <Icon
                                                            type="ios-trash-outline"
                                                            @click.prevent="
                                                                deleteFile()
                                                            "
                                                        ></Icon>
                                                    </div>
                                                </div>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="error darken-4"
                                        v-show="!editmode"
                                        dark
                                        @click="dialog = false"
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        v-show="editmode"
                                        color="error darken-4"
                                        dark
                                        @click="closeDocumentDialog"
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        color="success darken-4"
                                        @click.prevent="
                                            editmode
                                                ? updateDocument()
                                                : addDocument();
                                            loader = 'isAdding';
                                        "
                                        :loading="isAdding"
                                        :disabled="isAdding"
                                        v-show="!editmode"
                                    >
                                        Upload Document
                                        <template v-slot:loader>
                                            <span class="custom-loader">
                                                <v-icon light
                                                    >mdi-cached</v-icon
                                                >
                                            </span>
                                        </template>
                                    </v-btn>

                                    <v-btn
                                        color="success darken-4"
                                        @click.prevent="
                                            editmode
                                                ? updateDocument()
                                                : addDocument();
                                            loader = 'isAdding';
                                        "
                                        :loading="isAdding"
                                        :disabled="isAdding"
                                        v-show="editmode"
                                    >
                                        Edit Document
                                        <template v-slot:loader>
                                            <span class="custom-loader">
                                                <v-icon light
                                                    >mdi-cached</v-icon
                                                >
                                            </span>
                                        </template>
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </p>

                    <div class="_overflow _table_div">
                        <table class="_table">
                            <!-- TABLE TITLE -->
                            <tr>
                                <th>ID</th>
                                <th>Document Name</th>
                                <th>Countries</th>
                                <th>Subject</th>
                                <th>Years</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Document Type</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                            <!-- TABLE TITLE -->

                            <!-- ITEMS -->
                            <tr v-for="(document, i) in documents" :key="i">
                                <td>{{ document.id }}</td>
                                <td class="_table_name">
                                    {{ document.name }}
                                </td>
                                <td class="uppercase">
                                    {{ document.country }}
                                </td>
                                <td class="uppercase">
                                    {{ document.subject }}
                                </td>
                                <td>{{ document.years }}</td>
                                <td>{{ document.status }}</td>
                                <td>{{ document.remarks | upText }}</td>
                                <td>{{ document.documentType }}</td>
                                <!-- <td class="table_image">
                  <img :src="document.document" alt="Trade Documents" />
                </td> -->
                                <td>{{ document.created_at | myDate }}</td>
                                <td>
                                    <v-btn
                                        small
                                        color="primary darken-4"
                                        class="ma-1 flat"
                                        @click="editDocumentDialog(document, i)"
                                        >Edit</v-btn
                                    >
                                    <v-btn
                                        small
                                        color="error darken-4"
                                        class="ma-1 flat"
                                        @click="deleteDocument(document, i)"
                                        >Delete</v-btn
                                    >
                                </td>
                            </tr>
                            <!-- ITEMS -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    watch: {
        loader() {
            const l = this.loader;
            this[l] = !this[l];

            setTimeout(() => (this[l] = false), 4000);

            this.loader = null;
        }
    },
    data: () => ({
        dialog: false,
        editmode: false,
        isAdding: false,
        isDeleting: false,
        loader: null,
        modal: false,
        data: {
            name: "",
            country: "",
            subject: "",
            years: "",
            status: "",
            documentType: "",
            document: "",
            remarks: ""
        },
        editData: {
            name: "",
            country: "",
            subject: "",
            years: "",
            status: "",
            documentType: "",
            document: "",
            remarks: ""
        },
        documents: [],
        index: -1,
        i: -1,
        isDocumentNew: false,
        isEditingItem: false,
        token: "",
    }),
    methods: {
        handleSuccess(res, file) {
            console.log(`/uploads/${res}`);
            // res = `/uploads/${res}`;
            this.data.document = res;
            if (this.isEditingItem) {
                return (this.editData.document = res);
            }
        },
        handleError(res, file) {
            Swal.fire(
                "The File format is incorrect.",
                `${
                    file.errors.file.length
                        ? file.errors.file[0]
                        : "Something went wrong"
                }`,
                "error"
            );
        },
        handleFormatError(file) {
            Swal.fire(
                "The File format is incorrect.",
                "File format of " +
                    file.name +
                    " is incorrect. Please select PDF file.",
                "error"
            );
        },
        handleMaxSize(file) {
            Swal.fire(
                "Exceeding File Size Limit",
                "File format of " +
                    file.name +
                    " is too large, no more than 6MB.",
                "error"
            );
        },
        addDocumentDialog() {
            this.editmode = false;
            this.data.name = "";
            this.data.document = "";
            this.dialog = true;
        },
        editDocumentDialog(document, index) {
            this.editmode = true;
            this.data.name = "";
            this.dialog = true;
            this.editData = document;
            this.editData = Object.assign({}, document);
            this.index = index;
            this.isEditingItem = true;
        },
        closeDocumentDialog() {
            this.isEditingItem = false;
            this.dialog = false;
        },

        async addDocument() {
            console.log("Adding...");
            this.data.document = `/uploads/${this.data.document}`;
            const res = await this.callApi(
                "post",
                "api/create_document",
                this.data
            );
            if (res.status === 201) {
                this.documents.unshift(res.data);
                Toast.fire({
                    icon: "success",
                    title: "Document Created Successfully"
                });
                this.dialog = false;
                // this.data.name = "";
                // this.data.documentType = "";
                // this.data.document = "";
                this.data = "";
            } else {
                if ((res.status = 422)) {
                    console.log(res.data.errors);
                    for (let i in res.data.errors) {
                        // Toast.fire({
                        //     icon: "info",
                        //     title: res.data.errors[i][0]
                        // });
                        this.e(res.data.errors[i][0]);
                    }
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Something went wrong"
                    });
                }
            }
        },

        async updateDocument() {
            console.log("Editing...");
            const res = await this.callApi(
                "post",
                "api/edit_document",
                this.editData
            );
            if (res.status === 200) {
                this.documents[this.index] = this.editData;
                Toast.fire({
                    icon: "success",
                    title: "Document Updated Successfully"
                });
                this.dialog = false;
            } else {
                if (res.status == 422) {
                    console.log(res.data.errors);
                    for (let i in res.data.errors) {
                        // Toast.fire({
                        //     icon: "error",
                        //     title: res.data.errors[i][0]
                        // });
                        this.e(res.data.errors[i][0]);
                    }
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Something Went wrong"
                    });
                }
            }
        },

        async deleteFile(isAdd = true) {
            let document;
            if (!isAdd) {
                //   For Editing
                this.isIconImageNew = true;
                document = this.editData.document;
                this.editData.document = "";
                this.$refs.editDataUploads.clearFiles();
                console.log(this.editData.document);
            } else {
                document = this.data.document;
                this.data.document = "";
                this.$refs.uploads.clearFiles();
            }
            const res = await this.callApi("post", "api/delete_file", {
                imageName: document
            });
            if (res.status !== 200) {
                this.data.document = document;
                Toast.fire({
                    icon: error,
                    title: "Something went wrong"
                });
            }
            console.log(this.data.document);
        },

        async deleteDocument(document, i) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1B5E20",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    this.callApi("post", "api/delete_document", document).then(
                        () => {
                            Swal.fire(
                                "Deleted!",
                                "Document has been deleted Successfully.",
                                "success"
                            ),
                                this.documents.splice(i, 1);
                        }
                    );
                }
            });
        }
    },
    computed: {},
    async created() {
        this.token = window.Laravel.csrfToken;
        const res = await this.callApi("get", "api/get_document", {
            name: "name"
        });
        if (res.status == 200) {
            this.documents = res.data;
        } else {
            Toast.fire({
                icon: "error",
                title: "Something went wrong"
            });
        }
    }
};
</script>
<style>
@media (max-width: 768px) {
    .demo-upload-list {
        display: inline-block;
        width: 300px;
        height: 180px;
        text-align: center;
        line-height: 60px;
        border: 1px solid transparent;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        margin-right: 4px;
    }
}
@media (min-width: 768px) {
    .demo-upload-list {
        display: inline-block;
        width: 355px;
        height: 200px;
        text-align: center;
        line-height: 60px;
        border: 1px solid transparent;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
        position: relative;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        margin-right: auto;
        margin-left: auto;
        display: flex;
        align-items: center;
    }
}
.demo-upload-list img {
    width: 100%;
    height: 100%;
}
.demo-upload-list-cover {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.541);
}
.demo-upload-list:hover .demo-upload-list-cover {
    display: block;
}
.demo-upload-list-cover i {
    color: #fff;
    font-size: 30px;
    cursor: pointer;
    margin: 5rem 30px 0px 30px;
}

.custom-loader {
    animation: loader 1s infinite;
    display: flex;
}
@-moz-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@-webkit-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@-o-keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
@keyframes loader {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
