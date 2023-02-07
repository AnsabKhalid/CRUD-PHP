

function solution(P, C) {

if(P<2) return 0
let p = 0;
let g = 0;
while(p+2<=P && g+1<=C){
    p += 2
    g += 1
}

return g
}

int main() {
    int P, C;

    cin>>P>>endl;
    cin>>C>>endl;
}

int main(){
	int A [] = [1, 2, 3],

    int i;
    if(i=A, i<=A, i++) {
        return i;
    } else {
        return 0;
    }
}

public static int BinaryGap(int n)
{
	int maxGap = 0;
	int currentGap = 0;
	while(n > 0)
	{
		if(n % 2 == 0)
		{
			currentGap++;
			if(maxGap < currentGap)
			{
				maxGap = currentGap;
			}
		}
		else if(n % 2 == 1)
		{
			currentGap = 0;
		}
		n = n/2;
	}
	return 0
}