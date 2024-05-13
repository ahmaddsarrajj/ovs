import pandas as pd
import random
import numpy as np
import sys
import json


# Retrieve command line arguments
candidates_json = sys.argv[1]
# small_area_json = sys.argv[2]
# box_json = sys.argv[3]

# # Deserialize JSON strings into Python lists
# candidates = dict(candidates_json)

# # Initialize empty dictionaries for each key
# data = {}

# # Iterate through each object in the list
# for obj in candidates:
#     # Iterate through each key-value pair in the object
#     for key, value in obj.items():
#         # If the key doesn't exist in the result dictionary, create a new list for it
#         if key not in data:
#             data[key] = []
#         # Append the value to the list corresponding to the key
#         data[key].append(value)

# Print the result dictionary
print(candidates_json)
# small_area = json.loads(small_area_json)
# box = json.loads(box_json)

# # print(candidates)
# # print(small_area)
# # print(box)

# # # data = {element: index for index, element in enumerate(candidates)}


# # data = {
# #     'id': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,23 ,24],
# #     'firstname': ['John', 'Alice', 'Bob', 'Emily', 'Michael', 'Sarah', 'David', 'Emma', 'James', 'Olivia','John', 'Alice', 'Bob', 'Emily', 'Michael', 'Sarah', 'David', 'Emma', 'James', 'Olivia', 'David', 'Emma', 'James', 'Olivia' ],
# #     'lastname': ['Doe', 'Smith', 'Johnson', 'Brown', 'Jones', 'Wilson', 'Taylor', 'Anderson', 'Thomas', 'Roberts', 'Doe', 'Smith', 'Johnson', 'Brown', 'Jones', 'Wilson', 'Taylor', 'Ander', 'Thomas', 'Roberts', 'Brown', 'Jones', 'Wilson', 'Taylor'],
# #     'middlename': ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'G', 'H', 'I', 'J'],
# #     'mothername': ['Anne', 'Mary', 'Jane', 'Emma', 'Sophia', 'Olivia', 'Eva', 'Isabella', 'Grace', 'Charlotte', 'Anne', 'Mary', 'Jane', 'Emma', 'Sophia', 'Olivia', 'Eva', 'Isabella', 'Grace', 'Charlotte', 'Eva', 'Isabella', 'Grace', 'Charlotte'],
# #     'gender': ['M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F', 'M', 'F' ],
# #     'dob': ['1990-01-01', '1992-05-15', '1988-10-20', '1995-03-10', '1985-12-25', '1987-06-30', '1993-09-05', '1990-04-18', '1989-08-22', '1994-11-12', '1990-01-01', '1992-05-15', '1988-10-20', '1995-03-10', '1985-12-25', '1987-06-30', '1993-09-05', '1990-04-18', '1989-08-22', '1994-11-12', '1987-06-30', '1993-09-05', '1990-04-18', '1989-08-22'],
# #     'role_id': [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2],
# #     'list_id': [1, 2, 1, 3, 2, 3, 1, 2, 3, 1, 1, 2, 1, 3, 2, 3, 1, 2, 3, 1, 2, 3, 2, 3 ],
# #     'voted': [True, False, True, True, False, True, False, True, False, True, True, False, True, True, False, True, True, True, False, True, False, True, False, True],
# #     'register_id': [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 107, 108, 109, 110],
# #     'center_id': [201, 202, 203, 201, 202, 203, 201, 202, 203, 201, 201, 202, 203, 201, 202, 203, 201, 202, 203, 201, 201, 202, 203, 201],
# #     'small_area_id': [1, 2, 3, 4, 1, 2, 3, 4, 1, 2, 3, 4, 1, 2, 3, 4, 1, 2, 3, 4, 1, 2, 3, 4]
# # }

# # Sample register data
# register_data = {
#     'register_id': [101, 102, 103, 104, 105, 106, 107, 108, 109, 110],
#     'record_id': [201, 202, 203, 204, 205, 206, 207, 208, 209, 210]
# }

# # Sample record data
# record_data = {
#     'record_id': [201, 202, 203, 204, 205, 206, 207, 208, 209, 210],
#     'small_area_id': [1, 2, 3, 4,1, 2, 3, 4,1, 2]
# }

# # Sample small_area data
# small_area_data = {
#     'small_area_id': [1, 2, 3, 4],
#     'big_area_id': [1, 1, 1, 1],
#     'priority': [1, 2, 3, 4],
#     'seats_num': [4, 2, 1, 1]
# }

# # Sample big_area data
# big_area_data = {
#     'big_area_id': [1],
#     'area_name': ['North']
# }

# # Create DataFrames
# merged_df = pd.DataFrame(data)
# register_df = pd.DataFrame(register_data)
# record_df = pd.DataFrame(record_data)
# small_area_df = pd.DataFrame(small_area_data)
# big_area_df = pd.DataFrame(big_area_data)

# # Generate box data
# box_data = {
#     'id': range(1, len(data['id']) + 1),  # Assign a unique box ID for each candidate
#     'user_id': data['id'],
#     'vote_number_result': [random.randint(0, 100) for _ in range(len(data['id']))]  # Generate random vote numbers for demonstration
# }

# # Create DataFrame for box data
# box_df = pd.DataFrame(box_data)



# # Assuming there are 8 seats available
# total_seats = 8

# # Calculate total votes per list
# total_votes_per_list = merged_df.groupby('list_id')['voted'].sum()



# # Calculate the total number of votes across all lists
# total_votes = total_votes_per_list.sum()

# # Calculate the quotient of all lists
# first_quotient_lists = total_votes / total_seats

# # Compare total votes per list with the quotient
# first_result = total_votes_per_list[total_votes_per_list >= first_quotient_lists]

# #1  3   /   2     1/ 3     2

# # Get the failed lists (lists with total votes less than the second quotient)
# failed_lists = total_votes_per_list[total_votes_per_list < first_quotient_lists]

# # Get the total vote numbers of the failed lists
# failed_lists_total_votes = total_votes_per_list[total_votes_per_list < first_quotient_lists].sum()

# # Calculate the difference between total votes and total votes per list
# second_quotient_lists = (total_votes - failed_lists_total_votes) / total_seats

# # Return the division result
# division_result = first_result / second_quotient_lists

# # Calculate the fractional part of the division result
# fractional_part = division_result - division_result.astype(int)

# # Sort the lists by their fractional part in descending order
# sorted_lists_by_fractional = fractional_part.sort_values(ascending=False)

# # Get the index of the list with the highest fractional part
# index_of_winner = sorted_lists_by_fractional.index[0]

# # Get the integer part of the division result
# seat_number_of_each_list = division_result.astype(int)

# # Replace the list with the highest fractional part with index_of_winner
# seat_number_of_each_list[index_of_winner] += 1



# # print(seat_number_of_each_list)

# # Merge the total votes for each combination with the box_df DataFrame
# box_df = pd.merge(box_df, merged_df[['small_area_id', 'list_id']], left_on='user_id', right_index=True, how='left')

# # Group box_df by small_area_id and calculate the sum of vote_number_result
# sum_of_votes_per_small_area = box_df.groupby('small_area_id')['vote_number_result'].sum()

# # Merge the sum_of_votes_per_small_area back into box_df
# box_df = pd.merge(box_df, sum_of_votes_per_small_area, on='small_area_id', suffixes=('', '_sum'))
# # print(box_df)

# # Calculate the percentage of vote_number_result for each candidate
# box_df['percentage_of_votes_per_small_area'] = (box_df['vote_number_result'] / box_df['vote_number_result_sum']) * 100

# # Sort candidates within each list by vote_number_result_sum
# box_df['rank_within_list'] = box_df.groupby('list_id')['percentage_of_votes_per_small_area'].rank(ascending=False)

# # Sort candidates within each small area by vote_number_result_sum
# box_df['rank_within_small_area'] = box_df.groupby('small_area_id')['percentage_of_votes_per_small_area'].rank(ascending=False)


# # Merge the box_df DataFrame with the small_area_df DataFrame to get the rank_within_small_area for each user_id
# merged_box_small_area_df = pd.merge(box_df, small_area_df[['small_area_id', 'seats_num']], on='small_area_id', how='left')

# # Sort the merged DataFrame by small_area_id and rank_within_small_area
# merged_box_small_area_df.sort_values(by=['small_area_id', 'rank_within_small_area'], inplace=True)

# # Create an empty DataFrame to store the distribution of user_ids among seats
# seats_distribution_df = pd.DataFrame(columns=['small_area_id', 'seat_number', 'user_id'])

# # Create an empty DataFrame to store the distribution of user_ids among seats
# seats_distribution_df = pd.DataFrame(columns=['small_area_id', 'seat_number', 'user_id'])



# # Initialize an empty list to store the data
# seats_distribution_data = []
# # Create a dictionary to map user_id to list_id
# user_to_list_mapping = merged_box_small_area_df.set_index('user_id')['list_id'].to_dict()

# # Iterate over each small area
# for small_area_id, small_area_data in merged_box_small_area_df.groupby('small_area_id'):
#     # Get the number of seats for the current small area and cast it to integer
#     seats_num = int(small_area_data.iloc[0]['seats_num'])

#     # Sort candidates within each small area by rank_within_small_area
#     small_area_data.sort_values(by='rank_within_small_area', inplace=True)

#     # Get the seat allocations for the current list
#     list_id = small_area_data['list_id'].iloc[0]
#     list_seat_allocations = seat_number_of_each_list.get(list_id, None)

#     # Get the seats_number for the current list
#     list_seats_num = small_area_data.iloc[0]['seats_num']

#     # Convert list_seat_allocations to a numpy array if it's not None
#     if list_seat_allocations is not None:
#         list_seat_allocations = np.array(list_seat_allocations)

#     # Assign seats to candidates based on their rank and the number of seats allocated to the list
#     for seat_number, user_id in enumerate(small_area_data['user_id'].iloc[:seats_num], start=1):
#         # Check if seat allocations exist for the current list and if the allocation list is not empty
#         if list_seat_allocations is not None and list_seat_allocations.size > 0:
#             # Ensure the seat number is within the bounds of the list_seat_allocations
#             if seat_number <= list_seat_allocations.size:
#                 # Get the seat allocation for the current candidate
#                 seat_allocation = list_seat_allocations.item(seat_number - 1)
#             else:
#                 # If the seat number exceeds the allocation list size, default to seat_number
#                 seat_allocation = seat_number
#         else:
#             # If no seat allocations exist or the allocation list is empty, default to seat_number
#             seat_allocation = seat_number

#         # Get the list_id corresponding to the user_id
#         user_list_id = user_to_list_mapping.get(user_id, None)

#         # Append the user_id, list_id, seat_allocation, and list_seats_num to the list of data
#         seats_distribution_data.append({'small_area_id': small_area_id, 'seat_number': seat_allocation, 'user_id': user_id, 'list_id': user_list_id, 'seats_number': list_seats_num})
# # Create the seats_distribution_df DataFrame from the list of data
# seats_distribution_df = pd.DataFrame(seats_distribution_data)

# # Display the resulting DataFrame
# # print(seats_distribution_df)