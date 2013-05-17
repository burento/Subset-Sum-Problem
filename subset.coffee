set = [18897109, 12828837, 9461105, 6371773, 5965343, 5946800, 5582170, 5564635, 5268860, 4552402, 4335391, 4296250, 4224851, 4192887, 3439809, 3279833, 3095313, 2812896, 2783243, 2710489, 2543482, 2356285, 2226009, 2149127, 2142508, 2134411]
needle = 100000000

evaluate_array = (s, sum) ->
	arr = [0..sum]
	for i in [1..sum] by 1
		arr[i] = -1

	console.log("created work array")

	for a in s
		for i in [0..sum] by 1
			if arr[i] isnt -1 and arr[i] isnt a and (k+a) < sum
				arr[k+a] = a if arr[k+a] is -1
	arr

console.log("start eval")
job = evaluate_array(set, needle)

console.log(job[needle])


