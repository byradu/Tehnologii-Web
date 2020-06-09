import requests
import pprint
import json,ast
r = requests.get('https://qmegas.info/numista-api/country/list/')
r = ast.literal_eval(json.dumps(r.json()))
#parameter={"country_id":'roumanie',"limit":513}
#r = requests.get('https://qmegas.info/numista-api/country/coins/',params=parameter)
countries=[]
for each in r['countries']:
    countries.append(each['id'])

info = []
k=0;
for each in sorted(countries):
    k=k+1
    print("requested",each,k)
    parameter={"country_id":each}
    r = requests.get('https://qmegas.info/numista-api/country/coins/',params=parameter)
    total_items = {}
    total_items['id'] = each;
    total_items['items'] = r.json()['total_coins']
    info.append(total_items)
print("requests done")

print(info)
