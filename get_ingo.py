import requests
import pprint
import json,ast
import csv

""" def writeToJSONFile(fileName, data):
    filePathNameWExt = fileName + '.json'
    with open(filePathNameWExt, 'w') as fp:
        json.dump(data, fp) """

tari = ['moldavie','roumanie','etats-unis','germany','china']
with open('coins.csv','w',newline='')as f:
    fieldnames=['title','value','country','createdAt','description', 'imgFullName','reversePic']
    writer = csv.DictWriter(f,fieldnames=fieldnames)
    writer.writeheader()

    for tara in tari :
        print (tara)
        parameter={"country_id":tara,"limit":10}
        r = requests.get('https://qmegas.info/numista-api/country/coins/',params=parameter)
        coin_ids= []
        for each in r.json()['list']:
            coin_ids.append(each['id'])

        for each in coin_ids:   
            parameter={"coin_id":each}
            a = requests.get('https://qmegas.info/numista-api/coin/',params=parameter)
            metal = str(a.json()['metal'])
            shape = str(a.json()['shape'])
            """ diameter = str(a.json()['diameter']) """
            year = a.json()['years_range'][:4]
            description = shape + ", made of " + metal 
            writer.writerow({'title' : a.json()['title'], 'value': a.json()['value'], 'country': a.json()['country']['name'], 'createdAt': year,
            'description':description, 'imgFullName': a.json()['images']['obverse']['fullsize'], 'reversePic': a.json()['images']['reverse']['fullsize'] })
