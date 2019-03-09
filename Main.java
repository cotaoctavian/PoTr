import java.util.*;

public class Main {

    public static void printMatrix(int n, int a[][]) {
        int i, j, edges = 0, degree, max = -1, min = 999_999_999, sumOfTheDegrees = 0;

        if (n < 30_000) {
            for (i = 1; i <= n; i++) {
                degree = 0;
                for (j = 1; j <= n; j++) {
                    System.out.printf("%d ", a[i][j]);
                    if (a[i][j] == 1) degree++;
                }
                System.out.println();
                if (degree > max) max = degree;
                if (degree < min) min = degree;
                sumOfTheDegrees += degree;
            }

            for (i = 1; i <= n - 1; i++) {
                for (j = i + 1; j <= n; j++) {
                    if (a[i][j] == 1 && a[j][i] == 1 && i != j) {
                        edges++;
                    }
                }
            }
        } else {
            for (i = 1; i <= n; i++) {
                degree = 0;
                for (j = 1; j <= n; j++) {
                    if (a[i][j] == 1) degree++;
                }
                if (degree > max) max = degree;
                if (degree < min) min = degree;
                sumOfTheDegrees += degree;
            }

            for (i = 1; i <= n - 1; i++) {
                for (j = i + 1; j <= n; j++) {
                    if (a[i][j] == 1 && a[j][i] == 1 && i != j) {
                        edges++;
                    }
                }
            }
        }

        System.out.print("\n");
        System.out.println("The number of edges is: " + edges);
        System.out.println("Maximum degree of a vertex is \u0394(G) = " + max);
        System.out.println("Minimum degree of a vertex is \u03B4(G) = " + min);
        if (sumOfTheDegrees == 2 * edges) System.out.println("The sum of the degrees equals the value 2 * edges.");
        else System.out.println("The sum of the degrees it's not equal with the value 2 * edges.");
    }

    public static void RandomMatrix(int n, int a[][]) {
        System.out.println("Random Matrix: \n");
        int i, j;
        for (i = 1; i <= n - 1; i++) {
            for (j = i + 1; j <= n; j++)
                a[i][j] = a[j][i] = (int) (Math.random() * 2);
        }
    }

    public static void CompleteGraph(int n, int a[][]) {
        System.out.println("Complete Graph: \n");
        int i, j;
        for (i = 1; i <= n; i++)
            for (j = 1; j <= n; j++)
                if (i != j) a[i][j] = 1;
    }

    public static void CyclicGraph(int n, int a[][]) {
        System.out.println("Cyclic Graph: \n");
        int i;
        for (i = 1; i < n; i++) {
            a[i][i + 1] = 1;
            a[i + 1][i] = 1;
        }
        a[1][n] = 1;
        a[n][1] = 1;
    }

    public static void main(String[] args) {
        int n;
        if (args.length > 0) {
            final long start = System.nanoTime();
            n = Integer.parseInt(args[0]);
            if (n % 2 == 0) {
                int i, j;
                int[][] a = new int[n + 1][n + 1];

                CompleteGraph(n, a);
                printMatrix(n, a);

                System.out.print("\n");

                a = null;
                a = new int[n + 1][n + 1];
                CyclicGraph(n, a);
                printMatrix(n, a);

                System.out.print("\n");

                a = null;
                a = new int[n + 1][n + 1];
                RandomMatrix(n, a);
                printMatrix(n, a);

                final long end = System.nanoTime();
                long totalTime = end - start;
                totalTime /= 1_000_000_000;

                System.out.println("The running time of the application: " + totalTime + " seconds");

            } else System.out.println("Impar!");

        }

    }
}
