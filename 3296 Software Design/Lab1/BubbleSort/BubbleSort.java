import java.util.Random;

class BubbleSort {
	public static void main(String[] args) {
		

		int n = 10;
		int[] n_array = new int[n];
		int temp_int = 0; // Used during transfer to keep previous value
		int upperBound = 101; // Ramdom integer up on till 100
		Random rand = new Random();
		double Mflops = 0;

		// Fill Numbers Array
		for (int a = 0; a < n; a++) {
			n_array[a] = rand.nextInt(upperBound);
		}

		// Bubble Sort
		long start_time = System.nanoTime();
		
		for (int j = 0; j < n_array.length - 1; j++) {
			for (int i = 0; i < n_array.length - j - 1; i++)
				if (n_array[i] > n_array[i + 1]) {
					temp_int = n_array[i];
					n_array[i] = n_array[i + 1];
					n_array[i + 1] = temp_int;
				}

		}

		long end_time = System.nanoTime();
		Mflops = (n*n) / ((double) (end_time - start_time) / 1000000000) / 1000;
		System.out.println("\n\nSize of N: " + n + "\nExecution time: " + (double) (end_time - start_time) / 1000000000
				+ " seconds.\nMflops:   " + Mflops + "\nSorted Array: ");

		for (int b = 0; b < n; b++) {
			System.out.print(n_array[b] + " ");

		}
		System.out.println("\n");
	}
}
