import pdfmake from "pdfmake";

class PdfService {
    #pdf

    constructor() {
        this.#pdf = pdfmake;
        this.#pdf.fonts = {
            Roboto: {
                normal: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Regular.ttf',
                bold: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Medium.ttf',
                italics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Italic.ttf',
                bolditalics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-MediumItalic.ttf'
            },
        }
    }

    makeSendToDivisionReport(data, startDate, endDate, divisionName) {
        const hashTable = {};

        const body = [];
        body[0] = ['Nama Barang', 'Kuantitas', 'Pembuat', 'Tanggal'];

        for (let i = 0; i < data.length; i++) {

            if(data[i].trx.items.id in hashTable){
                hashTable[data[i].trx.items.id][1] += data[i].amount
            }else{
                hashTable[data[i].trx.items.id] = [
                    data[i].trx.items.name,
                    data[i].amount
                ]
            }

            body.push([data[i].trx.items.name, data[i].amount, data[i].issuer.name, new Date(data[i].created_at).toISOString().split('T')[0]])
        }

        const recapBody = [];
        console.log(Object.values(hashTable))
        recapBody.push(['Nama Barang', 'Total'])

        const x = Object.values(hashTable);
        for(const z in x){
            recapBody.push(x[z]);
        }

        const docDefinition = {
            content: [
                {text: `Laporan Pengiriman ke Divisi ${divisionName}`, style: 'header'},
                {text: `Tanggal, ${startDate} - ${endDate}`},
                {
                    margin: [0, 20],
                    table: {
                        widths: ['*', 'auto', '*', 'auto'],
                        headerRows: 1,
                        body: body
                    }
                },
                {text: "Rekapitulasi", style: 'header2'},
                {
                    margin: [0, 20],
                    table: {
                        widths: ['*', '*'],
                        headerRows: 1,
                        body: recapBody
                    }
                }
            ],
            styles: {
                defaultStyle: {
                    font: 'Helvetica'
                },
                header: {
                    fontSize: 18,
                    bold: true,
                },
                header2: {
                    fontSize: 16,
                    bold: true,
                },
                dateHead: {
                    fontSize: 12,
                    alignment: 'center',
                    color: '#3b3b3b'
                },
                bold: {
                    bold: true
                }
            }
        };
        pdfmake.createPdf(docDefinition).open();
    }
}

export default PdfService;
