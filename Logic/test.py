import json

# JSON string representing an array of objects
data_json = """
[
    {"id":"54892","register_id":"3809","list_id":"53","role_id":"1","small_area_id":"1"},
    {"id":"54964","register_id":"3827","list_id":"53","role_id":"1","small_area_id":"1"},
    {"id":"54994","register_id":"3834","list_id":"53","role_id":"1","small_area_id":"1"},
    {"id":"55017","register_id":"3848","list_id":"53","role_id":"1","small_area_id":"1"},
    {"id":"54978","register_id":"3850","list_id":"55","role_id":"1","small_area_id":"1"},
    {"id":"54996","register_id":"3865","list_id":"55","role_id":"1","small_area_id":"1"},
    {"id":"54893","register_id":"3890","list_id":"55","role_id":"1","small_area_id":"1"},
    {"id":"54902","register_id":"3891","list_id":"55","role_id":"1","small_area_id":"1"},
    {"id":"54997","register_id":"3904","list_id":"56","role_id":"1","small_area_id":"1"},
    {"id":"54937","register_id":"3913","list_id":"56","role_id":"1","small_area_id":"1"},
    {"id":"54913","register_id":"3927","list_id":"56","role_id":"1","small_area_id":"1"},
    {"id":"54998","register_id":"3936","list_id":"56","role_id":"1","small_area_id":"1"},
    {"id":"54950","register_id":"3943","list_id":"65","role_id":"1","small_area_id":"1"},
    {"id":"54992","register_id":"3965","list_id":"65","role_id":"1","small_area_id":"1"},
    {"id":"54965","register_id":"4005","list_id":"65","role_id":"1","small_area_id":"1"},
    {"id":"55031","register_id":"4011","list_id":"65","role_id":"1","small_area_id":"1"},
    {"id":"54963","register_id":"4023","list_id":"66","role_id":"1","small_area_id":"1"},
    {"id":"54960","register_id":"4045","list_id":"66","role_id":"1","small_area_id":"1"},
    {"id":"55041","register_id":"4076","list_id":"66","role_id":"1","small_area_id":"1"},
    {"id":"54981","register_id":"4105","list_id":"66","role_id":"1","small_area_id":"1"},
    {"id":"54993","register_id":"4171","list_id":"67","role_id":"1","small_area_id":"1"},
    {"id":"54938","register_id":"4228","list_id":"67","role_id":"1","small_area_id":"1"},
    {"id":"54976","register_id":"4232","list_id":"67","role_id":"1","small_area_id":"1"},
    {"id":"54962","register_id":"4275","list_id":"67","role_id":"1","small_area_id":"1"}
]
"""

# Parse the JSON string into a Python list of dictionaries
data = json.loads(data_json)

# Initialize empty dictionaries for each key
result = {}

# Iterate through each object in the list
for obj in data:
    # Iterate through each key-value pair in the object
    for key, value in obj.items():
        # If the key doesn't exist in the result dictionary, create a new list for it
        if key not in result:
            result[key] = []
        # Append the value to the list corresponding to the key
        result[key].append(value)

# Print the result dictionary
print(result)
