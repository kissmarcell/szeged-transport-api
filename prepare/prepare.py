import json

with open('stations.json', "r", encoding="utf-8") as f:
    data = json.load(f)

with open('stations.csv', 'w', encoding="utf-8") as f:
    for line in data:
        print(line['LocationId'], line['value'], line['Latitude'], line['Longitude'], ( 1 if line['IsAccessibility'] else 0) , sep=';', file=f)