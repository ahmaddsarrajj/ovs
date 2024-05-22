# # Calculate total votes per list
# total_votes_per_list = merged_df.groupby('list_id')['voted'].sum()



# # Calculate the total number of votes across all lists
# total_votes = total_votes_per_list.sum()

# # Calculate the quotient of all lists
# first_quotient_lists = total_votes / total_seats

# # Compare total votes per list with the quotient
# first_result = total_votes_per_list[total_votes_per_list >= first_quotient_lists]

# #1 3 / 2 1/ 3 2

# # Get the failed lists (lists with total votes less than the second quotient)
# failed_lists = total_votes_per_list[total_votes_per_list < first_quotient_lists] # # Get the total vote numbers of the
    failed lists # failed_lists_total_votes=total_votes_per_list[total_votes_per_list < first_quotient_lists].sum() # #
    Calculate the difference between total votes and total votes per list # second_quotient_lists=(total_votes -
    failed_lists_total_votes) / total_seats # # Return the division result # division_result=first_result /
    second_quotient_lists # # Calculate the fractional part of the division result # fractional_part=division_result -
    division_result.astype(int) # # Sort the lists by their fractional part in descending order #
    sorted_lists_by_fractional=fractional_part.sort_values(ascending=False) # # Get the index of the list with the
    highest fractional part # index_of_winner=sorted_lists_by_fractional.index[0] # # Get the integer part of the
    division result # seat_number_of_each_list=division_result.astype(int) # # Replace the list with the highest
    fractional part with index_of_winner # seat_number_of_each_list[index_of_winner] +=1 # #
    print(seat_number_of_each_list) # # Merge the total votes for each combination with the box_df DataFrame #
    box_df=pd.merge(box_df, merged_df[['small_area_id', 'list_id' ]], left_on='user_id' , right_index=True, how='left' )
    # # Group box_df by small_area_id and calculate the sum of vote_number_result #
    sum_of_votes_per_small_area=box_df.groupby('small_area_id')['vote_number_result'].sum() # # Merge the
    sum_of_votes_per_small_area back into box_df # box_df=pd.merge(box_df, sum_of_votes_per_small_area,
    on='small_area_id' , suffixes=('', '_sum' )) # # print(box_df) # # Calculate the percentage of vote_number_result
    for each candidate # box_df['percentage_of_votes_per_small_area']=(box_df['vote_number_result'] /
    box_df['vote_number_result_sum']) * 100 # # Sort candidates within each list by vote_number_result_sum #
    box_df['rank_within_list']=box_df.groupby('list_id')['percentage_of_votes_per_small_area'].rank(ascending=False) # #
    Sort candidates within each small area by vote_number_result_sum #
    box_df['rank_within_small_area']=box_df.groupby('small_area_id')['percentage_of_votes_per_small_area'].rank(ascending=False)
    # # Merge the box_df DataFrame with the small_area_df DataFrame to get the rank_within_small_area for each user_id #
    merged_box_small_area_df=pd.merge(box_df, small_area_df[['small_area_id', 'seats_num' ]], on='small_area_id' ,
    how='left' ) # # Sort the merged DataFrame by small_area_id and rank_within_small_area #
    merged_box_small_area_df.sort_values(by=['small_area_id', 'rank_within_small_area' ], inplace=True) # # Create an
    empty DataFrame to store the distribution of user_ids among seats #
    seats_distribution_df=pd.DataFrame(columns=['small_area_id', 'seat_number' , 'user_id' ]) # # Create an empty
    DataFrame to store the distribution of user_ids among seats #
    seats_distribution_df=pd.DataFrame(columns=['small_area_id', 'seat_number' , 'user_id' ]) # # Initialize an empty
    list to store the data # seats_distribution_data=[] # # Create a dictionary to map user_id to list_id #
    user_to_list_mapping=merged_box_small_area_df.set_index('user_id')['list_id'].to_dict() # # Iterate over each small
    area # for small_area_id, small_area_data in merged_box_small_area_df.groupby('small_area_id'): # # Get the number
    of seats for the current small area and cast it to integer # seats_num=int(small_area_data.iloc[0]['seats_num']) # #
    Sort candidates within each small area by rank_within_small_area #
    small_area_data.sort_values(by='rank_within_small_area' , inplace=True) # # Get the seat allocations for the current
    list # list_id=small_area_data['list_id'].iloc[0] # list_seat_allocations=seat_number_of_each_list.get(list_id,
    None) # # Get the seats_number for the current list # list_seats_num=small_area_data.iloc[0]['seats_num'] # #
    Convert list_seat_allocations to a numpy array if it's not None # if list_seat_allocations is not None: #
    list_seat_allocations=np.array(list_seat_allocations) # # Assign seats to candidates based on their rank and the
    number of seats allocated to the list # for seat_number, user_id in
    enumerate(small_area_data['user_id'].iloc[:seats_num], start=1): # # Check if seat allocations exist for the current
    list and if the allocation list is not empty # if list_seat_allocations is not None and list_seat_allocations.size>
    0:
    # # Ensure the seat number is within the bounds of the list_seat_allocations
    # if seat_number <= list_seat_allocations.size: # # Get the seat allocation for the current candidate #
        seat_allocation=list_seat_allocations.item(seat_number - 1) # else: # # If the seat number exceeds the
        allocation list size, default to seat_number # seat_allocation=seat_number # else: # # If no seat allocations
        exist or the allocation list is empty, default to seat_number # seat_allocation=seat_number # # Get the list_id
        corresponding to the user_id # user_list_id=user_to_list_mapping.get(user_id, None) # # Append the user_id,
        list_id, seat_allocation, and list_seats_num to the list of data #
        seats_distribution_data.append({'small_area_id': small_area_id, 'seat_number' : seat_allocation, 'user_id' :
        user_id, 'list_id' : user_list_id, 'seats_number' : list_seats_num}) # # Create the seats_distribution_df
        DataFrame from the list of data # seats_distribution_df=pd.DataFrame(seats_distribution_data) # # Display the
        resulting DataFrame # # print(seats_distribution_df)